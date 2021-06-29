<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\Messages;
use App\Traits\SelectionsRegistration;
use App\Traits\DOHHelpers;

use App\Models\Province;
use App\Models\CityMun;
use App\Models\Barangay;

class DOHDataSelections extends Controller
{

    use Messages, SelectionsRegistration, DOHHelpers;

    private $http_code_ok;
    private $http_code_error;    

	public function __construct()
	{
		// $this->middleware(['auth:api']);
		
        $this->http_code_ok = 200;
        $this->http_code_error = 500;

	}

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        //
        $selections = [
            "region_value" => $this->regionValue(),
            "employer_municipality_value" => $this->employerMunicipalityValue(),
            "suffix_value" => $this->suffixValue(),
            "gender_value" => $this->genderValue(),
            "civil_status_value" => $this->civilStatusValue(),
            "category_value" => $this->categoryValue(),
            "category_id_value" => $this->categoryIdValue(),
            "priority_group_value" => $this->priorityGroupValue(),
            "employment_status_value" => $this->employmentStatusValue(),
            "profession_value" => $this->professionValue(),
            "allergy_value" => $this->allergyValue(),
            "comorbidity_value" => $this->comorbidityValue(),
            "covid_classification_value" => $this->covidClassificationValue(),
            "employer_lgu_value" => $this->employerLguValue(),
            "month_value" => $this->monthValue(),
            "day_value" => $this->dayValue(),
            "addresses"=>$this->addresses(),
            "indigenous_value"=>$this->indigenousValue(),
            "deferral_value"=>$this->deferralValue(),
            "vaccines_value"=>$this->vaccinesValue(),
        ];

        return $this->jsonSuccessResponse($selections, 200);
    }

    public function addresses()
    {
        /**
         * Province
         */
        $get_provinces = Province::all();
        $provinces = [];
        foreach ($get_provinces as $province) {

            $doh_province = $this->toDOHProv($province);

            $get_municipalities = CityMun::where('provCode',$province['provCode'])->get();
            $municipalities = [];
            foreach ($get_municipalities as $municipality) {

                $doh_municipality = $this->toDOHMun($municipality);                

                $get_barangays = Barangay::where('citymunCode',$municipality['citymunCode'])->get();
                $barangays = [];
                foreach ($get_barangays as $barangay) {
                    $doh_brgy = $this->toDOHBrgy($barangay);
                    $barangays[] = [
                        "code"=>$barangay['brgyCode'],
                        "citymunCode"=>$municipality['citymunCode'],
                        "citymunId"=>$doh_municipality,
                        "name"=>$barangay['brgyDesc'],
                        "id"=>$doh_brgy
                    ];
                }

                $municipalities[] = [
                    "code"=>$municipality['citymunCode'],
                    "provCode"=>$province['provCode'],
                    "provId"=>$doh_province,
                    "name"=>$municipality['citymunDesc'],
                    "id"=>$doh_municipality,
                    "barangays"=>$barangays
                ];
            }

            $provinces[] = [
                "code"=>$province['provCode'],
                "name"=>$province['provDesc'],
                "id"=>$doh_province,
                "municipalities"=>$municipalities,
            ];

        }    

        return [
            "province_value" => $provinces,
        ];
    }

    public function brands()
    {
        $brands = $this->brandValue();
        return $this->jsonSuccessResponse($brands, 200);        
    }

    public function vaccinationSession()
    {
        $sessions = $this->vaccinationSessionValue();
        return $this->jsonSuccessResponse($sessions, 200);        
    }
    
    public function groups()
    {
        $groups = $this->groupsValue();
        return $this->jsonSuccessResponse($groups, 200);        
    }

    public function priorityGroups()
    {
        $priorityGroups = $this->priorityGroupValue();
        return $this->jsonSuccessResponse($priorityGroups, 200);        
    }

    public function adverseEvents()
    {
        $adverseEvents = $this->adverseEventsValue();
        return $this->jsonSuccessResponse($adverseEvents, 200);        
    }

    public function refusalValue()
    {
        $values = [
            ["id" => "I do not think this vaccine is safe", "name" => "I do not think this vaccine is safe"],
            ["id" => "I do not think this vaccine is effective", "name" => "I do not think this vaccine is effective"],
            ["id" => "I do not trust a vaccine that has come from another country", "name" => "I do not trust a vaccine that has come from another country"],
            ["id" => "I have religious beliefs that do not allow me to be vaccinated", "name" => "I have religious beliefs that do not allow me to be vaccinated"],
            ["id" => "Others", "name" => "Others"],
        ];

        return $this->jsonSuccessResponse($values, 200);
    }

}
