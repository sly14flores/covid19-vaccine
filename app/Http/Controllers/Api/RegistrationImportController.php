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
            'category', #1
            'category_id', #2
            'category_id_no', #3
            'philhealth', #4
            'pwd_id', #5
            'last_name', #6
            'first_name', #7
            'middle_name', #8
            'suffix', #9
            'contact_no', #10
            'address', #11
            'region', #12
            'province', #13
            'town_city', #14
            'barangay', #15
            'gender', #16
            'birthdate', #17
            'civil_status', #18
            'employment_status', #19
            'direct_interaction', #20
            'profession', #21
            'employer_name', #22
            'employer_municipality', #23
            'employer_address', #24
            'employer_contact_no', #25
            'pregnancy_status', #26
            'drug_allergy', #27
            'food_allergy', #28
            'insect_allergy', #29
            'latex_allergy', #30
            'mold_allergy', #31
            'pet_allergy', #32
            'pollen_allergy', #33
            'with_comorbidity', #34
            'hypertension', #35
            'heart_disease', #36
            'kidney_disease', #37
            'diabetes_mellitus', #38
            'bronchial_asthma', #39
            'immuno_deficiency_status', #40
            'cancer', #41
            'comorbidity_others', #42
            'diagnosed', #43
            'diagnosed_date', #44
            'covid_classification', #45
            'consent_vaccination' #46
        ];

        $this->validations = [
            'qr_pass_id' => [
                'header' => 'NAPANAM QR PASS_ID',
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #0
            'category' => [
                'header' => 'Category',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->categoryValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,                     
            ], #1
            'category_id' => [
                'header' => 'Category_ID',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->categoryIdValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => true,         
            ], #2
            'category_id_no' => [
                'header' => 'Category_ID_Number',                
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #3
            'philhealth' => [
                'header' => 'PhilHealth_ID',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,           
            ], #4
            'pwd_id' => [
                'header' => 'PWD ID',                
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => true,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #5
            'last_name' => [
                'header' => 'Last_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #6
            'first_name' => [
                'header' => 'First_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false, 
                'default_unknown' => false,
                'default_category_id' => false,             
            ], #7
            'middle_name' => [
                'header' => 'Middle_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #8
            'suffix' => [
                'header' => 'Suffix',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->suffixValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #9
            'contact_no' => [
                'header' => 'Contact_No',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #10
            'address' => [
                'header' => 'Current_Residence:_Unit/Building/House_Number,_Street_Name',
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #11
            'region' => [
                'header' => 'Current_Residence:_Region',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->regionValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #12
            'province' => [
                'header' => 'Current_Residence:Province',
                'required' => true,
                'formatted' => true,
                'formats' => $this->provinceValue(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #13
            'town_city' => [
                'header' => 'Current_Residence:Municipality/City',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->munCityValue(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #14
            'barangay' => [
                'header' => 'Current_Residence:Barangay',                
                'required' => true,
                'formatted' => true,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #15
            'gender' => [
                'header' => 'Sex',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->genderValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #16
            'birthdate' => [
                'header' => 'Birthdate',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #17
            'civil_status' => [
                'header' => 'Civil_Status',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->civilStatusValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #18
            'employment_status' => [
                'header' => 'Employment_Status',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->employmentStatusValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,           
            ], #19
            'direct_interaction' => [
                'header' => 'Directly_in_interaction_with_COVID_patient',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #20
            'profession' => [
                'header' => 'Profession',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->professionValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #21
            'employer_name' => [
                'header' => 'Name_of_Employer',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #22
            'employer_municipality' => [
                'header' => 'Province/HUC/ICC_of_Employer',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->employerMunicipalityValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #23
            'employer_address' => [
                'header' => 'Address_of_Employer',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #24
            'employer_contact_no' => [
                'header' => 'Contact_number_of_employer',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #25
            'pregnancy_status' => [
                'header' => 'Pregnancy_status',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->pregnantStatus(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #26
            'drug_allergy' => [
                'header' => 'Drug_Allergy',               
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #27
            'food_allergy' => [
                'header' => 'Food_Allergy',              
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #28
            'insect_allergy' => [
                'header' => 'Insect_Allergy',            
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,           
            ], #29
            'latex_allergy' => [
                'header' => 'Latex_Allergy',           
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #30
            'mold_allergy' => [
                'header' => 'Mold_Allergy',            
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #31
            'pet_allergy' => [
                'header' => 'Pet_Allergy',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #32
            'pollen_allergy' => [
                'header' => 'Pollen_Allergy',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #33
            'with_comorbidity' => [
                'header' => 'With_Comorbidity',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNone(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #34
            'hypertension' => [
                'header' => 'Hypertension',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #35
            'heart_disease' => [
                'header' => 'Heart_Disease',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #36
            'kidney_disease' => [
                'header' => 'Kidney_Disease',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #37
            'diabetes_mellitus' => [
                'header' => 'Diabetes_Mellitus',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #38
            'bronchial_asthma' => [
                'header' => 'Bronchial_Asthma',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #39
            'immuno_deficiency_status' => [
                'header' => 'Immunodeficiency_Status',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #40
            'cancer' => [
                'header' => 'Cancer',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #41
            'comorbidity_others' => [
                'header' => 'Others',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #42
            'diagnosed' => [
                'header' => 'Patient_was_diagnosed_with_COVID_19',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,
            ], #43
            'diagnosed_date' => [
                'header' => 'Date_of_first_positive_result',                
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => true,
                'default_unknown' => false,
                'default_category_id' => false,               
            ], #44
            'covid_classification' => [
                'header' => 'Classification_of_COVID_19',                
                'required' => false,
                'formatted' => true,
                'formats' => collect($this->covidClassificationValue())->pluck('id'),
                'na_if_empty' => false,
                'default_unknown' => false,
                'default_category_id' => false,               
            ], #45
            'consent_vaccination'  => [
                'header' => 'Willing to be vaccinated?',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNoUnknown(),
                'na_if_empty' => false,
                'default_unknown' => true,
                'default_category_id' => false,
            ] #46
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

        $path = "imports/$hospital/";
        $filename = Str::random(40).".".$request->file('excel')->getClientOriginalExtension();

        $request->file('excel')->storeAs($path, $filename);

        return $this->jsonCreateSuccessResponse([
            'filename' => $filename
        ]);

    }


    /**
     * Check if excel file has correct structures
     */
    public function check(Request $request)
    {

        $excel = $request->excel;

        if (is_null($excel)) {
            return $this->jsonErrorDataValidation();
        }

        $hospital = Auth::user()->hospital;
        $file_path = storage_path()."/app/imports/$hospital/$excel";

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
        foreach ($rows as $i => $row) {

            if ($i == 0) continue;
            if ($i == 1) continue;

            $cols = [];
            foreach($row as $key => $cell) {
                if ($properties[$key] == "birthdate") {
                    $birthdate = date("Y-m-d",PODate::excelToTimestamp(intval($cell)));
                    $cols[$properties[$key]] = ($birthdate=="1970-01-01")?"":$birthdate;
                } else {
                    $cols[$properties[$key]] = $cell;
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

                    $default_unknown = $validations[$p]['default_unknown'];
                    if ($default_unknown) {
                        if ($value == "") {
                            $row[$p] = "03_Unknown";
                            $value = "03_Unknown";
                        }
                    }

                    $default_category_id = $validations[$p]['default_category_id'];
                    if ($default_category_id) {
                        if ($value == "") {
                            $row[$p] = "04_Other_ID";
                            $value = "04_Other_ID";
                        }
                    }
                    
                    if ($p == "comorbidity_others") {
                        if ($value != "") {
                            $row[$p] = "01_Yes";
                            $value = "01_Yes";
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
                                // $validate[] = "Invalid value for {$header}";
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
                                // $validate[] = "Invalid value for {$header}";
                            } else { # Province is valid               
                                // town_city
                                // $formats = $validations['town_city']['formats'];
                                $formats = $this->provMunCityValue($row['province']);                                
                                if (gettype($formats)=='object') {
                                    $formats = $formats->toArray();
                                }
                                if (!in_array($row['town_city'],$formats)) { # City/Municipality is invalid
                                    // $validate[] = "Invalid value for {$header}";
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
                    if ($value == "Initiating import...") {
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
                "message" => "Initiating import",
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
                    ['dob',$data['birthdate']],
                    ['qrpass_status','Active']
                ])->first();
    
                // No NAPANAM yet
                if (is_null($get_qr_pass)) {
    
                    // Map data
                    $napanam = [
                        'type' => 'Person', # Person
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
                        'address' => $data['address'], # Street / Road
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

        if ($data['diagnosed_date']=="NA") {
            unset($data['diagnosed_date']);
        }

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
