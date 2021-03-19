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
            "employment_status_value" => $this->employmentStatusValue(),
            "profession_value" => $this->professionValue(),
            "allergy_value" => $this->allergyValue(),
            "comorbidity_value" => $this->comorbidityValue(),
            "covid_classification_value" => $this->covidClassificationValue(),
            "employer_lgu_value" => $this->employerLguValue(),
            "month_value" => $this->monthValue(),
            "day_value" => $this->dayValue(),
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

            $get_municipalities = CityMun::where('provCode',$province['provCode'])->get();
            $municipalities = [];
            foreach ($get_municipalities as $municipality) {
                $get_barangays = Barangay::where('citymunCode',$municipality['citymunCode'])->get();
                $barangays = [];
                foreach ($get_barangays as $barangay) {
                    $doh_brgy = $this->toDOHBrgy($barangay);
                    $barangays[] = [
                        "name"=>$barangay['brgyDesc'],
                        "id"=>$doh_brgy
                    ];
                }

                $doh_municipality = $this->toDOHMun($municipality);
                $municipalities[] = [
                    "name"=>$municipality['citymunDesc'],
                    "id"=>$doh_municipality,
                    "barangays"=>$barangays
                ];
            }

            $doh_province = $this->toDOHProv($province);
            $provinces[] = [
                "name"=>$province['provDesc'],
                "id"=>$doh_province,
                "municipalities"=>$municipalities,
            ];

        }    

        return [
            "province_value" => $provinces,
        ];
    }

    public function vaccines()
    {
        $vaccines = $this->vaccineValue();
        return $this->jsonSuccessResponse($vaccines, 200);        
    }

}
