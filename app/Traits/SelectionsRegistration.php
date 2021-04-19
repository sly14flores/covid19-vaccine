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

    public function priorityGroupValue()
    {
        return [
            [
                "name"=>"Health Care Workers",
                "description"=>"(A1) Health Care Workers",
                "id"=>"01_A1",
                "subs"=> [
                    ["name"=>"COVID-19 Referral Hospitals", "description"=>"(A1.1) COVID-19 Referral Hospitals", "id"=>"01_A1.1"],
                    ["name"=>"Hopitals Catering to C19 Cases", "description"=>"(A1.2) Hopitals Catering to C19 Cases", "id"=>"02_A1.2"],
                    ["name"=>"Quarantine Isolation Facilities", "description"=>"(A1.3) Quarantine Isolation Facilities", "id"=>"03_A1.3"],
                    ["name"=>"Remaining Hospitals", "description"=>"(A1.4) Remaining Hospitals", "id"=>"04_A1.4"],
                    ["name"=>"Government Owned Community Based Primary Care Facilities", "description"=>"(A1.5) Government Owned Community Based Primary Care Facilities", "id"=>"05_A1.5"],
                    ["name"=>"Stand-alone Clinics and Diagnostics", "description"=>"(A1.6) Stand-alone Clinics and Diagnostics", "id"=>"06_A1.6"],
                    ["name"=>"Closed Settings and Institutions", "description"=>"(A1.7) Stand-alone Clinics and Diagnostics", "id"=>"07_A1.7"],
                ]
            ],
            [
                "name"=>"Senior citizens aged 60 years old and above ",
                "description"=>"(A2) Senior citizens aged 60 years old and above ",
                "id"=>"02_A2",
                "subs"=> []
            ],
            [
                "name"=>"Adult with Comorbidity",
                "description"=>"(A3) Persons with comorbidities not otherwise included in the preceding categories",
                "id"=>"03_A3",
                "subs"=> []
            ],
            [
                "name"=>"Frontline Personnel in Essential Sector",
                "description"=>"(A4) Frontline Personnel in Essential Sector",
                "id"=>"04_A4",
                "subs"=> [
                    ["name"=>"Commuter transport (land, air, and sea), including logistics", "description"=>"(A4.1) Commuter transport (land, air, and sea), including logistics", "id"=>"01_A4.1"],
                    ["name"=>"Public and private wet and dry market vendors; frontline workers in groceries, supermarkets, delivery services", "description"=>"(A4.2) Public and private wet and dry market vendors; frontline workers in groceries, supermarkets, delivery services", "id"=>"02_A4.2"],
                    ["name"=>"Workers in manufacturing for food, beverage, medical, and pharmaceutical products", "description"=>"(A4.3) Workers in manufacturing for food, beverage, medical, and pharmaceutical products", "id"=>"03_A4.3"],
                    ["name"=>"Frontline workers in food retail, including food service delivery", "description"=>"(A4.4) Frontline workers in food retail, including food service delivery", "id"=>"04_A4.4"],
                    ["name"=>"Frontline workers in Financial Services in private and government", "description"=>"(A4.5) Frontline workers in Financial Services in private and government", "id"=>"05_A4.5"],
                    ["name"=>"Frontline workers in hotels and accommodation establishment", "description"=>"(A4.6) Frontline workers in hotels and accommodation establishment", "id"=>"06_A4.6"],
                    ["name"=>"Priests, Pastors, rabbis, imams or such other religious leaders regardless of denomination", "description"=>"(A4.7) Priests, Pastors, rabbis, imams or such other religious leaders regardless of denomination", "id"=>"07_A4.7"],
                    ["name"=>"Security guards/personnel assigned in the establishments, offices, agencies, and organizations identified in the list of priority industry/sectors", "description"=>"(A4.8) Security guards/personnel assigned in the establishments, offices, agencies, and organizations identified in the list of priority industry/sectors", "id"=>"08_A4.8"],
                    ["name"=>"Frontline workers in news media, both private and government", "description"=>"(A4.9) Priests, pastors, religious leaders regardless of denomination", "id"=>"9_A4.9"],
                    ["name"=>"Customer-facing personnel of telecoms, cable and internet service providers, electricity distribution, water distribution utilities", "description"=>"(A4.10) Customer-facing personnel of telecoms, cable and internet service providers, electricity distribution, water distribution utilities", "id"=>"10_A4.10"],
                    ["name"=>"Frontline personnel in basic education and higher education institutions and agencies", "description"=>"(A4.11) Frontline personnel in basic education and higher education institutions and agencies", "id"=>"11_A4.11"],
                    ["name"=>"Overseas Filipino workers not classified above, and scheduled for deployment within two months", "description"=>"(A4.12) Overseas Filipino workers not classified above, and scheduled for deployment within two months", "id"=>"12_A4.12"],
                    ["name"=>"Frontline workers in law/justice, security, and social protection sectors", "description"=>"(A4.13) Frontline workers in law/justice, security, and social protection sectors", "id"=>"13_A4.13"],
                    ["name"=>"Frontline government workers engaged in operations of government transport system, quarantine inspection, worker safety inspection and other activities indispensable to the COVID response", "description"=>"(A4.14) Frontline government workers engaged in operations of government transport system, quarantine inspection, worker safety inspection and other activities indispensable to the COVID response", "id"=>"14_A4.14"],
                    ["name"=>"Frontline government workers in charge of tax collection; assessment of businesses for incentives; election; national ID; data collection personnel", "description"=>"(A4.15) Frontline government workers in charge of tax collection; assessment of businesses for incentives; election; national ID; data collection personnel", "id"=>"15_A4.15"],
                    ["name"=>"Diplomatic Community and Department of Foreign Affairs personnel in consular operations", "description"=>"(A4.16) Diplomatic Community and Department of Foreign Affairs personnel in consular operations", "id"=>"16_A4.16"],
                    ["name"=>"Department of Public Works and Highways personnel in charge of monitoring government infrastructure projects", "description"=>"(A4.17) Department of Public Works and Highways personnel in charge of monitoring government infrastructure projects", "id"=>"17_A4.17"],
                ]
            ],
            // [
            //     "name"=>"Poor Population",
            //     "id"=>"05_A5",
            //     "subs"=> []
            // ],
            // [
            //     "name"=>"Teachers and Social Workers",
            //     "id"=>"06_B1",
            //     "subs"=> []
            // ],
            // [
            //     "name"=>"Other Government Workers",
            //     "id"=>"07_B2",
            //     "subs"=> []
            // ],
            // [
            //     "name"=>"Other Essential Workers",
            //     "id"=>"08_B3",
            //     "subs"=> []
            // ],
            // [
            //     "name"=>"Socio-demographic Groups",
            //     "id"=>"09_B4",
            //     "subs"=> []
            // ],
            // [
            //     "name"=>"Overseas Filipino Workers",
            //     "id"=>"10_B5",
            //     "subs"=> []
            // ],
            // [
            //     "name"=>"Other Remaining Workforce",
            //     "id"=>"11_B6",
            //     "subs"=> []
            // ], 
            // [
            //     "name"=>"Rest of the Population",
            //     "id"=>"12_C",
            //     "subs"=> []
            // ],                                                                                                                                                                                                  
        ];
    }

    public function subPriorityGroupValue($code)
    {
        $prioritiy_groups = collect($this->priorityGroupValue());
        $prioritiy_group = $prioritiy_groups->where('id',$code)->first();
        $sub_priority_groups = collect($prioritiy_group['subs'])->pluck('id');
        
        return $sub_priority_groups;
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
        $brands = config('constants.brands');

        return $brands;
    }

    public function vaccinationSessionValue()
    {
        $sessions = config('constants.sessions');

        return $sessions;
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