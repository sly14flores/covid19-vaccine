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
            ], #0
            'category' => [
                'header' => 'Category',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->categoryValue())->pluck('id'),
                'na_if_empty' => false,                
            ], #1
            'category_id' => [
                'header' => 'Category_ID',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->categoryIdValue())->pluck('id'),
                'na_if_empty' => false,                
            ], #2
            'category_id_no' => [
                'header' => 'Category_ID_Number',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,                
            ], #3
            'philhealth' => [
                'header' => 'PhilHealth_ID',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,                
            ], #4
            'pwd_id' => [
                'header' => 'PWD ID',                
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => true,
            ], #5
            'last_name' => [
                'header' => 'Last_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,                
            ], #6
            'first_name' => [
                'header' => 'First_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,                
            ], #7
            'middle_name' => [
                'header' => 'Middle_Name',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
            ], #8
            'suffix' => [
                'header' => 'Suffix',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->suffixValue())->pluck('id'),
                'na_if_empty' => false,
            ], #9
            'contact_no' => [
                'header' => 'Contact_No',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
            ], #10
            'address' => [
                'header' => 'Current_Residence:_Unit/Building/House_Number,_Street_Name',
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
            ], #11
            'region' => [
                'header' => 'Current_Residence:_Region',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->regionValue())->pluck('id'),
                'na_if_empty' => false,
            ], #12
            'province' => [
                'header' => 'Current_Residence:Province',
                'required' => true,
                'formatted' => true,
                'formats' => $this->provinceValue(),
                'na_if_empty' => false,
            ], #13
            'town_city' => [
                'header' => 'Current_Residence:Municipality/City',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->munCityValue(),
                'na_if_empty' => false,
            ], #14
            'barangay' => [
                'header' => 'Current_Residence:Barangay',                
                'required' => true,
                'formatted' => true,
                'formats' => [],
                'na_if_empty' => false,
            ], #15
            'gender' => [
                'header' => 'Sex',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->genderValue())->pluck('id'),
                'na_if_empty' => false,
            ], #16
            'birthdate' => [
                'header' => 'Birthdate',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
            ], #17
            'civil_status' => [
                'header' => 'Civil_Status',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->civilStatusValue())->pluck('id'),
                'na_if_empty' => false,
            ], #18
            'employment_status' => [
                'header' => 'Employment_Status',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->employmentStatusValue())->pluck('id'),
                'na_if_empty' => false,                
            ], #19
            'direct_interaction' => [
                'header' => 'Directly_in_interaction_with_COVID_patient',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #20
            'profession' => [
                'header' => 'Profession',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->professionValue())->pluck('id'),
                'na_if_empty' => false,
            ], #21
            'employer_name' => [
                'header' => 'Name_of_Employer',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
            ], #22
            'employer_municipality' => [
                'header' => 'Province/HUC/ICC_of_Employer',                
                'required' => true,
                'formatted' => true,
                'formats' => collect($this->employerMunicipalityValue())->pluck('id'),
                'na_if_empty' => false,
            ], #23
            'employer_address' => [
                'header' => 'Address_of_Employer',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
            ], #24
            'employer_contact_no' => [
                'header' => 'Contact_number_of_employer',                
                'required' => true,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => false,
            ], #25
            'pregnancy_status' => [
                'header' => 'Pregnancy_status',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->pregnantStatus(),
                'na_if_empty' => false,
            ], #26
            'drug_allergy' => [
                'header' => 'Drug_Allergy',               
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #27
            'food_allergy' => [
                'header' => 'Food_Allergy',              
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #28
            'insect_allergy' => [
                'header' => 'Insect_Allergy',            
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,                
            ], #29
            'latex_allergy' => [
                'header' => 'Latex_Allergy',           
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #30
            'mold_allergy' => [
                'header' => 'Mold_Allergy',            
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #31
            'pet_allergy' => [
                'header' => 'Pet_Allergy',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #32
            'pollen_allergy' => [
                'header' => 'Pollen_Allergy',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #33
            'with_comorbidity' => [
                'header' => 'With_Comorbidity',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNone(),
                'na_if_empty' => false,
            ], #34
            'hypertension' => [
                'header' => 'Hypertension',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #35
            'heart_disease' => [
                'header' => 'Heart_Disease',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #36
            'kidney_disease' => [
                'header' => 'Kidney_Disease',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #37
            'diabetes_mellitus' => [
                'header' => 'Diabetes_Mellitus',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #38
            'bronchial_asthma' => [
                'header' => 'Bronchial_Asthma',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #39
            'immuno_deficiency_status' => [
                'header' => 'Immunodeficiency_Status',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #40
            'cancer' => [
                'header' => 'Cancer',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #41
            'comorbidity_others' => [
                'header' => 'Others',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #42
            'diagnosed' => [
                'header' => 'Patient_was_diagnosed_with_COVID_19',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNo(),
                'na_if_empty' => false,
            ], #43
            'diagnosed_date' => [
                'header' => 'Date_of_first_positive_result',                
                'required' => false,
                'formatted' => false,
                'formats' => [],
                'na_if_empty' => true,
            ], #44
            'covid_classification' => [
                'header' => 'Classification_of_COVID_19',                
                'required' => false,
                'formatted' => true,
                'formats' => collect($this->covidClassificationValue())->pluck('id'),
                'na_if_empty' => false,
            ], #45
            'consent_vaccination'  => [
                'header' => 'Provided_Electronic_Informed_Consent',                
                'required' => true,
                'formatted' => true,
                'formats' => $this->yesNoUnknown(),
                'na_if_empty' => false,
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
            foreach ($row as $p => $value) {
                if ($p=="valid") continue;

                $required = $validations[$p]['required'];
                if ($required) {
                    $header = $validations[$p]['header'];
                    $formatted = $validations[$p]['formatted'];
                    $formats = $validations[$p]['formats'];
                    if (gettype($formats)=='object') {
                        $formats = $formats->toArray();
                    }
                    if ($formatted) {
                        if ($p=="barangay") {
                            // town_city
                            $formats = $validations['town_city']['formats'];
                            if (gettype($formats)=='object') {
                                $formats = $formats->toArray();
                            }                            
                            if (!in_array($row['town_city'],$formats)) { # City/Municipality is invalid
                                $validate[] = "Invalid value for {$header}";
                            } else { # City/Municipality is valid
                                $formats = $this->barangayValue($row['town_city']);
                                if (gettype($formats)=='object') {
                                    $formats = $formats->toArray();
                                }
                                if (!in_array($value,$formats)) {
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

            $validated[] = $validate;

        }

        /**
         * If $validation is empty then all rows have valid values
         */
        
        return $validations;
        return $validated;

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

    }    

}
