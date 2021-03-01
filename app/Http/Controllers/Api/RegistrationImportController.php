<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;
use App\Traits\Messages;
use App\Rules\ExcelRule;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as PODate;

use App\Models\QrPass;
use App\Models\Registration;

class RegistrationImportController extends Controller
{
    use Messages;

    private $http_code_ok;
    private $http_code_error;  

    public function __construct()
	{

		$this->middleware(['auth:api']);

        $this->http_code_ok = 200;
        $this->http_code_error = 500;

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

    }

    /**
     * Import row from excel file
     */
    public function import(Request $request)
    {

        $excel = $request->excel;

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

        $properties = [
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
        $data = [];
        /**
         * Analyze rows
         * 
         */
        $analysis = [];
        foreach ($rows as $i => $row) {

            if ($i == 0) continue;
            if ($i == 1) continue;
            if ($i > 3) break;

            $cols = [];
            foreach($row as $key => $cell) {
                if ($properties[$key] == "birthdate") {
                    $cols[$properties[$key]] = date("Y-m-d",PODate::excelToTimestamp(intval($cell)));
                } else {
                    $cols[$properties[$key]] = $cell;
                }
            }

            $data[] = $cols;
        }

        return $data;

    }

}
