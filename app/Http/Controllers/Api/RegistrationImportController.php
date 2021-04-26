<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;
use App\Traits\Messages;
use App\Traits\SelectionsRegistration;
use App\Rules\ExcelRule;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as PODate;

use App\Models\QrPass;
use App\Models\Registration;

class RegistrationImportController extends Controller
{
    use Messages, SelectionsRegistration;

    private $http_code_ok;
    private $http_code_error;

    private $properties;
    private $validations;

    public function __construct()
	{

		$this->middleware(['auth:api']);
        $this->middleware('throttle:import')->only(['import','postRegistration']);

        $this->http_code_ok = 200;
        $this->http_code_error = 500;

        $this->properties = [
            'qr_pass_id', #0
            'priority_group', #1
            'sub_priority_group', #2
            'last_name', #3                               
            'first_name', #4
            'middle_name', #5
            'suffix', #6
            'contact_no', #7
            'region', #8
            'province', #9
            'town_city', #10
            'barangay', #11
            'gender', #12                                                           
            'birthdate', #13
            'occupation', #14
            'allergic_to_vaccines', #15            
            'with_comorbidity', #16
        ];

        $this->validations = [
            'qr_pass_id' => [
                'header' => 'NAPANAM QR PASS_ID',
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
            ], #0
            'priority_group' => [
                'header' => 'Priority Group',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->priorityGroupValue())->pluck('id'),
                'default_no' => false,
                'na_if_empty' => false,            
            ], #1
            'sub_priority_group' => [
                'header' => 'Sub Priority Group',                
                'required' => true,
                'formatted' => true,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,              
            ], #2            
            'last_name' => [
                'header' => 'Last_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
            ], #3            
            'first_name' => [
                'header' => 'First_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,        
            ], #4
            'middle_name' => [
                'header' => 'Middle_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
            ], #5
            'suffix' => [
                'header' => 'Suffix',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->suffixValue())->pluck('id'),
                'default_no' => false,
                'na_if_empty' => false,
            ], #6
            'contact_no' => [
                'header' => 'Contact_No',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
            ], #7   
            'region' => [
                'header' => 'Current_Residence:_Region',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->regionValue())->pluck('id'),
                'default_no' => false,
                'na_if_empty' => false,
            ], #8
            'province' => [
                'header' => 'Current_Residence:Province',
                'required' => true,
                'formatted' => true,
                'formats' => $this->provinceValue(),
                'default_no' => false,
                'na_if_empty' => false,
            ], #9
            'town_city' => [
                'header' => 'Current_Residence:Municipality/City',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->munCityValue(),
                'default_no' => false,
                'na_if_empty' => false,
            ], #10
            'barangay' => [
                'header' => 'Current_Residence:Barangay',                
                'required' => true,
                'formatted' => true,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
            ], #11
            'gender' => [
                'header' => 'Sex',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->genderValue())->pluck('id'),
                'default_no' => false,
                'na_if_empty' => false,
            ], #12
            'birthdate' => [
                'header' => 'Birthdate',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
            ], #13
            'occupation' => [
                'header' => 'Occupation',                
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
            ], #14
            'allergic_to_vaccines' => [
                'header' => 'Allergy to vaccines or components of vaccines',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'default_no' => true,
                'na_if_empty' => false,
            ], #15
            'with_comorbidity' => [
                'header' => 'With_Comorbidity',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNone(),
                'default_no' => false,
                'na_if_empty' => false,
            ], #16
        ];

	}

    public function upload(Request $request)
    {

		$rules = [
			'excel' => ['required',new ExcelRule($request->file('excel'))],
		];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        };

        $hospital = Auth::user()->hospital;
        if (is_null($hospital)) {
            $hospital = Str::random(10);
        }

        $path = "imports/$hospital/";
        $filename = Str::random(40).".".$request->file('excel')->getClientOriginalExtension();

        $request->file('excel')->storeAs($path, $filename);

        return $this->jsonCreateSuccessResponse([
            'filename' => $filename,
            'path' => $path
        ]);

    }


    /**
     * Check if excel file has correct structures
     */
    public function check(Request $request)
    {

        $excel = $request->excel;
        $path = $request->path;

        if (is_null($excel)) {
            return $this->jsonErrorDataValidation();
        }

        $hospital = Auth::user()->hospital;
        $file_path = storage_path()."/app/{$path}{$excel}";

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($file_path);

        $worksheet = $spreadsheet->getActiveSheet();

        $rows = [];
        foreach ($worksheet->getRowIterator() as $row) {

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE);

            $row = [];
            foreach ($cellIterator as $cell) {
                $row[] = trim($cell->getValue());
            }          

            $rows[] = $row;

        }

        $properties = $this->properties;
        $assocs = [];
        /**
         * Associate columns
         */
        // return $rows;
        foreach ($rows as $i => $row) {

            if ($i == 0) continue;

            $cols = [];
            foreach($row as $key => $cell) {
                if (isset($properties[$key])) {
                    if ($properties[$key] == "birthdate") {
                        $birthdate = date("Y-m-d",PODate::excelToTimestamp(intval($cell)));
                        $cols[$properties[$key]] = ($birthdate=="1970-01-01")?"":$birthdate;
                    } else {
                        $cols[$properties[$key]] = $cell;
                    }
                }
            }

            $cols['valid'] = false;

            $assocs[] = $cols;
        }

        $validations = $this->validations;
        
        /**
         * Remove empty row
         */
        $filtered = collect($assocs)->filter(function($row) {
            return $this->isEmptyRow($row)===false;
        });

        // return $filtered;
        
        $validated = [];
        /**
         * Validate
         */
        foreach ($filtered as $i => $row) {

            $validate = [];
            $index = 0;
            foreach ($row as $p => $value) {
                if ($p=="valid") continue;

                $index++;

                $required = $validations[$p]['required'];
                if ($required) {
                    $header = $validations[$p]['header'];
                    $formatted = $validations[$p]['formatted'];
                    $formats = $validations[$p]['formats'];

                    $default_no = $validations[$p]['default_no'];
                    if ($default_no) {
                        if ($value == "") {
                            $row[$p] = "02_No";
                            $value = "02_No";
                        }
                    }                    

                    if (gettype($formats)=='object') {
                        $formats = $formats->toArray();
                    }
                    if ($formatted) {
                        if ($p=="town_city") {
                            // province
                            $formats = $validations['province']['formats'];
                            if (gettype($formats)=='object') {
                                $formats = $formats->toArray();
                            }
                            if (!in_array($row['province'],$formats)) { # Province is invalid

                            } else { # Province is valid
                                $formats = $this->provMunCityValue($row['province']);
                                if (gettype($formats)=='object') {
                                    $formats = $formats->toArray();
                                }
                                if (!in_array($value,$formats)) {
                                    $validate[] = "Invalid value for {$header}";
                                }                                
                            }    
                        } elseif ($p=="barangay") {
                            // province
                            $formats = $validations['province']['formats'];
                            if (gettype($formats)=='object') {
                                $formats = $formats->toArray();
                            }
                            if (!in_array($row['province'],$formats)) { # Province is invalid

                            } else { # Province is valid               
                                // town_city
                                $formats = $this->provMunCityValue($row['province']);                                
                                if (gettype($formats)=='object') {
                                    $formats = $formats->toArray();
                                }
                                if (!in_array($row['town_city'],$formats)) { # City/Municipality is invalid

                                } else { # City/Municipality is valid
                                    $formats = $this->barangayValue($row['town_city']);
                                    if (gettype($formats)=='object') {
                                        $formats = $formats->toArray();
                                    }
                                    if (!in_array($value,$formats)) {
                                        $validate[] = "Invalid value for {$header}";
                                    }                                
                                }
                            }
                        } elseif ($p=="priority_group") {
                            $exp = explode(":",$value);
                            $row['priority_group'] = $exp[0];
                            if (!in_array($exp[0],$formats)) {
                                $validate[] = "Invalid value for {$header}";
                            }                            
                        } elseif ($p=="sub_priority_group") {
                            $exp = explode(":",$row['priority_group']);
                            if ($exp[0]=="01_A1") {
                                $formats = $this->subPriorityGroupValue($exp[0]);
                                if (gettype($formats)=='object') {
                                    $formats = $formats->toArray();
                                }
                                $exp = explode(":",$value);
                                $row['sub_priority_group'] = $exp[0];
                                if (!in_array($exp[0],$formats)) {
                                    $validate[] = "Invalid value for {$header}";
                                }
                            }
                        } else {                      
                            if (!in_array($value,$formats)) {
                                $validate[] = "Invalid value for {$header}";
                            }
                        }
                    } else {
                        if ($value=="") {
                            $validate[] = "No value for {$header}";
                        }
                    }
                }

                $na_if_empty = $validations[$p]['na_if_empty'];
                if ($na_if_empty) {
                    if ($value == "") {
                        $row[$p] = "N/A";  
                    }
                }
            }

            $filtered[$i] = $row;

            if (count($validate)) {
                $validation = [
                    "index" => $index,
                    "for" => "Correction(s) for {$row['last_name']} {$row['first_name']} {$row['middle_name']}",
                    "invalid" => $validate,
                ];
                $validated[] = $validation;
            }

        }

        /**
         * If $validation is empty then all rows have valid values
         */
        $response = [];
        if (count($validated)) {
            return $this->jsonErrorDataValidation($validated);            
        } else {
            $response = [
                "message" => "Initiating import...",
                "rows" => $filtered->values()->all()
            ];
            return $this->jsonCreateSuccessResponse($response);
        }

    }

    private function isEmptyRow($row)
    {
        $empties = [];
        foreach ($this->properties as $p) {
            if ($p=='qr_pass_id') continue;
            $empties[] = ($row[$p] == "");
        }

        return collect($empties)->every(function($empty) {
            return $empty;
        });
    }

    /**
     * Import row from excel file
     */
    public function import(Request $request)
    {

        $registrations = $request->registrations;

        $messages = [];
        foreach ($registrations as $data) {

            $fullname = "{$data['last_name']} {$data['first_name']} {$data['middle_name']}";

            $qr_pass_id = $data['qr_pass_id'];
    
            if ($qr_pass_id=="") {
    
                /**
                 * Import to NAPANAM
                 */
    
                // Check info in NAPANAM
                $lastname = strtoupper($data['last_name']);
                $firstname = strtoupper($data['first_name']);
                $middlename = strtoupper($data['middle_name']);
    
                $get_qr_pass = QrPass::where([
                    ['lastname',$lastname],
                    ['firstname',$firstname],
                    ['middlename',$middlename],
                    ['dob',$data['birthdate']]
                    // ['qrpass_status','Active']
                ])->first();
    
                // No NAPANAM yet
                if (is_null($get_qr_pass)) {
    
                    // Map data
                    $napanam = [
                        'type' => 'Person', # Person
                        'name' => "$lastname $firstname $middlename",
                        'category' => 'Resident', # Resident
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'middlename' => $middlename,
                        'gender' => $this->dohToGender($data['gender']),
                        'nationality' => 'PHL', # PHL
                        'dob' => $data['birthdate'],
                        'age' => $this->computeAge($data['birthdate']),
                        'mobile_number' => $data['contact_no'],
                        'email' => null,
                        // 'address' => $data['address'], # Street / Road
                        'addressbrgy' => $this->dohToBrgy($data['barangay']),
                        'addressmunicity' => $this->dohToMun($data['town_city']),
                        'addressprovince' => $this->dohToProv($data['province']),
                    ];
    
                    $qr_pass = new QrPass;
                    $qr_pass->fill($napanam);
                    $qr_pass->save();
    
                    $generated_qr = $qr_pass->id;
                    $data['qr_pass_id'] = $generated_qr;  
                    $messages[] = "No information found in NAPANAM. Information imported with generated ID: {$generated_qr}";
                    $messages[] = $this->postRegistration($data);
    
                } else {
    
                    $get_qr_pass_id = $get_qr_pass->id;
                    $messages[] = "NAPANAM information found, using ID: $get_qr_pass_id";
                    $data['qr_pass_id'] = $get_qr_pass_id;
                    
                    $messages[] = $this->postRegistration($data);              
    
                }            
    
            } else {
    
                $messages[] = $this->postRegistration($data);
    
            }            

        }

        return $this->jsonCreateSuccessResponse($messages);

    }

    private function postRegistration($data)
    {
        $message = "";

        $get_registration = Registration::where('qr_pass_id',$data['qr_pass_id'])->first();

        $fullname = "{$data['last_name']} {$data['first_name']} {$data['middle_name']}";        
        if (is_null($get_registration)) {
            $registration = new Registration;
            $registration->fill($data);
            $registration->save();
            $message = "Registration imported for $fullname";
        } else {
            $message = "Existing registration for $fullname, skipping import";
        }        

        return $message;
        
    }

}