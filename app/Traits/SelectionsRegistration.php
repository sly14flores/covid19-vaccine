<?php

namespace App\Traits;

use App\Models\Province;
use App\Models\CityMun;
use App\Models\Barangay;
use App\Traits\DOHHelpers;

trait SelectionsRegistration
{

    use DOHHelpers;

    public function genderValue()
    {
        return [
            ["name"=>"Female", "id"=>"01_Female"],
            ["name"=>"Male", "id"=>"02_Male"]
        ];
    }

    public function suffixValue()
    {
        return [
            ["name"=>"NA", "id"=>"NA"],            
            ["name"=>"II", "id"=>"II"],
            ["name"=>"III", "id"=>"III"],
            ["name"=>"IV", "id"=>"IV"],
            ["name"=>"V", "id"=>"V"],
            ["name"=>"JR", "id"=>"JR"],
            ["name"=>"SR", "id"=>"SR"],
        ];        
    }

    public function civilStatusValue()
    {
        return [
            ["name"=>"Single", "id"=>"01_Single"],
            ["name"=>"Married", "id"=>"02_Married"],
            ["name"=>"Widow/Widower", "id"=>"03_Widow/Widower"],
            ["name"=>"Separated/Annulled", "id"=>"04_Separated/Annulled"],
            ["name"=>"Living with Partner", "id"=>"05_Living_with_Partner"]
        ];
    }

    public function categoryValue()
    {
        return [
            ["name"=>"Health Care Worker", "id"=>"01_Health_Care_Worker"],
            ["name"=>"Senior Citizen", "id"=>"02_Senior_Citizen"],
            ["name"=>"Indigent", "id"=>"03_Indigent"],
            ["name"=>"Uniformed Personnel", "id"=>"04_Uniformed_Personnel"],
            ["name"=>"Essential Worker", "id"=>"05_Essential_Worker"],
            ["name"=>"Other", "id"=>"06_Other"]
        ];
    }

    public function categoryIdValue()
    {
        return [
            ["name"=>"PRC number", "id"=>"01_PRC_number"],
            ["name"=>"OSCA number", "id"=>"02_OSCA_number"],
            ["name"=>"Facility ID number", "id"=>"03_Facility_ID_number"],
            ["name"=>"Other ID", "id"=>"04_Other_ID"]
        ];
    }

    public function employmentStatusValue()
    {
        return [
            ["name"=>"Government Employed", "id"=>"01_Government_Employed"],
            ["name"=>"Private Employed", "id"=>"02_Private_Employed"],
            ["name"=>"Self-employed", "id"=>"03_Self_employed"],
            ["name"=>"Private Practitioner", "id"=>"04_Private_practitioner"],
            ["name"=>"Others", "id"=>"05_Others"]
        ];
    }

    public function professionValue()
    {        
        return [
            ["name"=>"Dental Hygienist", "id"=>"01_Dental_Hygienist"],
            ["name"=>"Dental Technologist", "id"=>"02_Dental_Technologist"],
            ["name"=>"Dentist", "id"=>"03_Dentist"],
            ["name"=>"Medical Technologist", "id"=>"04_Medical_Technologist"],
            ["name"=>"Midwife", "id"=>"05_Midwife"],
            ["name"=>"Nurse", "id"=>"06_Nurse"],
            ["name"=>"Nutritionist Dietician", "id"=>"07_Nutritionist_Dietician"],
            ["name"=>"Occupational Therapist", "id"=>"08_Occupational_Therapist"],
            ["name"=>"Optometrist", "id"=>"09_Optometrist"],
            ["name"=>"Pharmacist", "id"=>"10_Pharmacist"],
            ["name"=>"Physical", "id"=>"11_Physical Therapist"],
            ["name"=>"Physician", "id"=>"12_Physician"],
            ["name"=>"Radiologic Technologist", "id"=>"13_Radiologic_Technologist"],
            ["name"=>"Respiratory Therapist", "id"=>"14_Respiratory_Therapist"],
            ["name"=>"X-ray Technologist", "id"=>"15_X_ray_Technologist"],
            ["name"=>"Barangay Health_Worker", "id"=>"16_Barangay_Health_Worker"],
            ["name"=>"Maintenance Staff", "id"=>"17_Maintenance_Staff"],
            ["name"=>"Administrative Staff", "id"=>"18_Administrative_Staff"],
            ["name"=>"Others", "id"=>"19_Others_"],
        ];
    }

    public function allergyValue()
    {
        return [
            ["name"=>"Drug", "id"=>"01"],
            ["name"=>"Food", "id"=>"02"],
            ["name"=>"Insect", "id"=>"03t"],
            ["name"=>"Latex", "id"=>"04"],
            ["name"=>"Mold", "id"=>"05"],
            ["name"=>"Pet", "id"=>"06"],
            ["name"=>"Pollen", "id"=>"07"]
        ];
    }

    public function comorbidityValue()
    {
        return [
            ["name"=>"Hypertension", "id"=>"01"],
            ["name"=>"Heart disease", "id"=>"02"],
            ["name"=>"Kidney disease", "id"=>"03"],
            ["name"=>"Diabetes mellitus", "id"=>"04"],
            ["name"=>"Bronchial Asthma", "id"=>"05"],
            ["name"=>"Immunodeficiency state", "id"=>"06"],
            ["name"=>"Cancer", "id"=>"07"],
        ];
    }

    public function covidClassificationValue()
    {
        return [
            ["name"=>"Asymptomatic", "id"=>"01_Asymptomatic"],
            ["name"=>"Mild", "id"=>"02_Mild"],
            ["name"=>"Moderate", "id"=>"03_Moderate"],
            ["name"=>"Severe", "id"=>"04_Severe"],
            ["name"=>"Critical", "id"=>"05_Critical"],
        ];        
    }

    public function employerLguValue()
    {
        return [
            ["name"=>"Component City", "id"=>"01"],
            ["name"=>"Municipality", "id"=>"02"],
        ];
    }

    public function employerMunicipalityValue()
    {
        return [
            ["name"=>"AGOO", "id"=>"13301 - AGOO"],
            ["name"=>"ARINGAY", "id"=>"13302 - ARINGAY"],
            ["name"=>"BACNOTAN", "id"=>"13303 - BACNOTAN"],
            ["name"=>"BAGULIN", "id"=>"13304 - BAGULIN"],
            ["name"=>"BALAOAN", "id"=>"13305 - BALAOAN"],
            ["name"=>"BANGAR", "id"=>"13306 - BANGAR"],
            ["name"=>"BAUANG", "id"=>"13307 - BAUANG"],
            ["name"=>"BURGOS", "id"=>"13308 - BURGOS"],
            ["name"=>"CABA", "id"=>"13309 - CABA"],
            ["name"=>"LUNA", "id"=>"13310 - LUNA"],
            ["name"=>"NAGUILIAN", "id"=>"13311 - NAGUILIAN"],
            ["name"=>"PUGO", "id"=>"13312 - PUGO"],
            ["name"=>"ROSARIO", "id"=>"13313 - ROSARIO"],
            ["name"=>"CITY OF SAN FERNANDO", "id"=>"13314 - CITY_OF_SAN_FERNANDO_"],
            ["name"=>"SAN GABRIEL", "id"=>"13315 - SAN_GABRIEL"],
            ["name"=>"SAN JUAN", "id"=>"13316 - SAN_JUAN"],
            ["name"=>"SANTO TOMAS", "id"=>"13317 - SANTO_TOMAS"],
            ["name"=>"SANTOL", "id"=>"13318 - SANTOL"],
            ["name"=>"SUDIPEN", "id"=>"13319 - SUDIPEN"],
            ["name"=>"TUBAO", "id"=>"13320 - TUBAO"],
            ["name"=>"LA UNION", "id"=>"133 - LA_UNION"],            
        ];
    }

    public function regionValue()
    {
        return [
            ["name"=>"Ilocos", "id"=>"Ilocos"],
            ["name"=>"Cagayan Valley", "id"=>"CagayanValley"],
            ["name"=>"Central Luzon", "id"=>"CentralLuzon"],
            ["name"=>"CALABARZON", "id"=>"CALABARZON"],
            ["name"=>"Bicol Region", "id"=>"BicolRegion"],
            ["name"=>"Western Visayas", "id"=>"WesternVisayas"],
            ["name"=>"Central Visayas", "id"=>"CentralVisayas"],
            ["name"=>"Eastern Visayas", "id"=>"EasternVisayas"],
            ["name"=>"Zamboanga Peninsula", "id"=>"ZamboangaPeninsula"],
            ["name"=>"Northern Mindanao", "id"=>"NorthernMindanao"],
            ["name"=>"Davao Region", "id"=>"DavaoRegion"],
            ["name"=>"Soccsksargen", "id"=>"Soccsksargen"],
            ["name"=>"National CapitalRegion", "id"=>"NationalCapitalRegion"],
            ["name"=>"Cordillera Administrative Region", "id"=>"CordilleraAdministrativeRegion"],
            ["name"=>"Bangsamoro Autonomous Region", "id"=>"BangsamoroAutonomousRegion"],
            ["name"=>"CARAGA", "id"=>"CARAGA"],
            ["name"=>"MIMAROPA", "id"=>"MIMAROPA"],
        ];
    }

    public function monthValue()
    {
        return [
            ["name"=>"January", "id"=>"01"],
            ["name"=>"February", "id"=>"02"],
            ["name"=>"March", "id"=>"03"],
            ["name"=>"April", "id"=>"04"],
            ["name"=>"May", "id"=>"05"],
            ["name"=>"June", "id"=>"06"],
            ["name"=>"July", "id"=>"07"],
            ["name"=>"August", "id"=>"08"],
            ["name"=>"September", "id"=>"09"],
            ["name"=>"October", "id"=>"10"],
            ["name"=>"November", "id"=>"11"],
            ["name"=>"December", "id"=>"12"],
        ];
    }

    public function dayValue()
    {
        return [
            ["name"=>"01", "id"=>"01"],
            ["name"=>"02", "id"=>"02"],
            ["name"=>"03", "id"=>"03"],
            ["name"=>"04", "id"=>"04"],
            ["name"=>"05", "id"=>"05"],
            ["name"=>"06", "id"=>"06"],
            ["name"=>"07", "id"=>"07"],
            ["name"=>"08", "id"=>"08"],
            ["name"=>"09", "id"=>"09"],
            ["name"=>"10", "id"=>"10"],
            ["name"=>"11", "id"=>"11"],
            ["name"=>"12", "id"=>"12"],
            ["name"=>"13", "id"=>"13"],
            ["name"=>"14", "id"=>"14"],
            ["name"=>"15", "id"=>"15"],
            ["name"=>"16", "id"=>"16"],
            ["name"=>"17", "id"=>"17"],
            ["name"=>"18", "id"=>"18"],
            ["name"=>"19", "id"=>"19"],
            ["name"=>"20", "id"=>"20"],
            ["name"=>"21", "id"=>"21"],
            ["name"=>"22", "id"=>"22"],
            ["name"=>"23", "id"=>"23"],
            ["name"=>"24", "id"=>"24"],
            ["name"=>"25", "id"=>"25"],
            ["name"=>"26", "id"=>"26"],
            ["name"=>"27", "id"=>"27"],
            ["name"=>"28", "id"=>"28"],
            ["name"=>"29", "id"=>"29"],
            ["name"=>"30", "id"=>"30"],
            ["name"=>"31", "id"=>"31"],
        ];
    }

    public function provinceValue()
    {
        $provinces = Province::where('regCode',1)->select(['provCode','provDesc'])->get();

        $provinces = $provinces->map(function($province) {

            $province->doh = $this->toDOHProv($province->toArray());
            return $province;

        });

        return $provinces->pluck('doh');
    }

    public function munCityValue()
    {
        $city_muns = CityMun::where('provCode',133)->select(['citymunCode','citymunDesc'])->get();

        $city_muns = $city_muns->map(function($cm) {

            $cm->doh = $this->toDOHMun($cm);
            return $cm;

        });

        return $city_muns->pluck('doh');
    }


    public function provMunCityValue($doh_code)
    {

        $doh_code_exploded = explode("_",$doh_code);
        $code = intval($doh_code_exploded[1]);    
        $city_muns = CityMun::where('provCode',$code)->select(['citymunCode','citymunDesc'])->get();

        $city_muns = $city_muns->map(function($cm) {

            $cm->doh = $this->toDOHMun($cm);
            return $cm;

        });

        return $city_muns->pluck('doh');
    }    

    public function barangayValue($doh_code)
    {
        $doh_code_exploded = explode("_",$doh_code);
        $code = intval($doh_code_exploded[1]);
        $barangays = Barangay::where('citymunCode',$code)->select(['brgyCode','brgyDesc'])->get();

        $barangays = $barangays->map(function($barangay) {

            $barangay->doh = $this->toDOHBrgy($barangay);
            return $barangay;

        });

        return $barangays->pluck('doh');
    }

    public function brandValue()
    {
        /**
         * Brands
         */
        $brands = [
            [
                'id' => 1,
                'name' => 'Pfizer',
            ],
            [
                'id' => 2,
                'name' => 'Astrazeneca'                
            ],
            [
                'id' => 3,
                'name' => 'Sinovac'
            ],
            [
                'id' => 4,
                'name' => 'Moderna'
            ], 
        ];

        return $brands;
    }

    public function yesNo()
    {
        return [
            "01_Yes",
            "02_No",
        ];
    }

    public function yesNone()
    {
        return [
            "01_Yes",
            "02_None",
        ];
    }

    public function yesNoUnknown()
    {
        return [
            "01_Yes",
            "02_No",
            "03_Unknown",
        ];
    }    

    public function pregnantStatus()
    {
        return [
            '01_Pregnant',
            '02_Not_Pregnant',
        ];
    }

}