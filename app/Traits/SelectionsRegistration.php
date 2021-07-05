<?php

namespace App\Traits;

use App\Models\Province;
use App\Models\CityMun;
use App\Models\Barangay;
use App\Traits\DOHHelpers;

trait SelectionsRegistration
{

    use DOHHelpers;

    public function contactsValue()
    {
        return [
            [
                "name" => "AGOO", 
                "id" => "_13301_AGOO",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0998 961 1519  <br> <b>Tel. No.</b><br> (072) 607-8723 <br> (072) 242-5550 <br> 911']
            ],
            [
                "name" => "ARINGAY", 
                "id" => "_13302_ARINGAY",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0917 800 1605 <br> 0907 313 9072 <br> <b>Tel. No.</b><br> 607-4878 <br> 607-9464']
            ],
            [
                "name" => "BACNOTAN", 
                "id" => "_13303_BACNOTAN",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0949 472 4161 <br> 0909 847 1268 <br> 0917 773 9994']
            ],
            [
                "name" => "BAGULIN", 
                "id" => "_13304_BAGULIN",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0977 265 9798 <br> 0915 889 3737 <br> 0946 638 7988']
            ],
            [
                "name" => "BALAOAN", 
                "id" => "_13305_BALAOAN",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0927 714 2308 <br> 0961 021 6145 <br> 0908 867 1786 <br> 0946 072 2976']
            ],
            [
                "name" => "BANGAR", 
                "id" => "_13306_BANGAR",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0998 343 4568 <br> <b>Tel. No.</b><br> (072) 607-4245']
            ],
            [
                "name" => "BAUANG", 
                "id" => "_13307_BAUANG",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0998 575 3188']
            ],
            [
                "name" => "BURGOS", 
                "id" => "_13308_BURGOS",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0939 903 4750 <br> 0950 320 3145']
            ],
            [
                "name" => "CABA", 
                "id" => "_13309_CABA",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0915 247 3936 <br> 0917 856 3808 <br> <b>Tel. No.</b><br> (072) 607-3420']
            ],
            [
                "name" => "LUNA", 
                "id" => "_13310_LUNA",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0918 257 3612 <br> 0998 967 3041']
            ],
            [
                "name" => "NAGUILIAN", 
                "id" => "_13311_NAGUILIAN",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0953 238 5049 <br> 0921 471 6619 <br> <b>Tel. No.</b><br> (072) 619-4928']
            ],
            [
                "name" => "PUGO", 
                "id" => "_13312_PUGO",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0956 407 8212 <br> 0917 501 2397 <br> 0945 826 1416']
            ],
            [
                "name" => "ROSARIO", 
                "id" => "_13313_ROSARIO",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0917 714 0515 <br> 0912 267 4723']
            ],
            [
                "name" => "SAN FERNANDO CITY", 
                "id" => "_13314_CITY_OF_SAN_FERNANDO",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0928 193 7818 <br> 0917 676 7673 <br> 0928 522 0622 <br> <b>Tel. No.</b><br> (072) 888-6915 <br> (072) 607-7880']
            ],
            [
                "name" => "SAN FERNANDO CITY", 
                "id" => "_13314_CITY_OF_SAN_FERNANDO",
                "contact" => ['number' => '<b>Mobile No.</b> <br> 0928 193 7818 <br> 0917 676 7673 <br> 0928 522 0622 <br> <b>Tel. No.</b><br> (072) 888-6915 <br> (072) 607-7880']
            ],
            [
                "name" => "SAN GABRIEL", 
                "id" => "_13315_SAN_GABRIEL",
                "contact" => ['number' => '<b>Mobile No.</b><br> 0905 819 7375 <br> 0912 010 6747 <br> 0917 185 2711 <br> <b>Tel. No.</b><br> (072) 682-0504']
            ],
            [
                "name" => "SAN JUAN", 
                "id" => "_13316_SAN_JUAN",
                "contact" => ['number' => '<b>Mobile No.</b><br> 0936 082 4277 <br> 0951 100 6212']
            ],
            [
                "name" => "SANTO TOMAS", 
                "id" => "_13317_SANTO_TOMAS",
                "contact" => ['number' => '<b>Mobile No.</b><br> 0950 393 8326 <br> 0945 198 8450 <br> 0927 469 4472']
            ],
            [
                "name" => "SANTOL", 
                "id" => "_13318_SANTOL",
                "contact" => ['number' => '<b>Mobile No.</b><br> 0918 391 3674 <br> 0908 910 1225 <br> 0945 821 8228 <br> <b>Tel. No.</b><br> (072) 619-4164']
            ],
            [
                "name" => "SUDIPEN", 
                "id" => "_13319_SUDIPEN",
                "contact" => ['number' => '<b>Mobile No.</b><br> 0939 968 8330 <br> <b>Tel. No.</b><br> (072) 607-2351']
            ],
            [
                "name" => "TUBAO", 
                "id" => "_13320_TUBAO",
                "contact" => ['number' => '<b>Mobile No.</b><br> 0999 788 0606 <br> 0915 999 8432']
            ],
        ];
    }

    public function genderValue()
    {
        return [
            ["name"=>"Female", "id"=>"01_Female"],
            ["name"=>"Male", "id"=>"02_Male"]
        ];
    }

    public function vaccinesValue()
    {
        return [
            ["name"=>"Pfizer", "id"=>1],            
            ["name"=>"Moderna", "id"=>2],
            ["name"=>"AstraZeneca ", "id"=>3],
            ["name"=>"Sputnik V/Gamaleya", "id"=>4],
            ["name"=>"Johnson and Johnson", "id"=>5],
            ["name"=>"Sinovac", "id"=>6],
            ["name"=>"Covaxin", "id"=>7],
            ["name"=>"EpicVacCorona", "id"=>8],
            ["name"=>"CoviVac", "id"=>9],
            ["name"=>"Novavax", "id"=>10],
            ["name"=>"Oxford Astrazenica", "id"=>11],
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
            ["name"=>"Other", "id"=>"06_Other"],
            ["name"=>"Comorbidities", "id"=>"07_Comorbidities"],
            ["name"=>"Teachers Social Workers", "id"=>"08_Teachers_Social_Workers"],
            ["name"=>"Other Government Workers", "id"=>"09_Other_Govt_Workers"],
            ["name"=>"Other High Risk", "id"=>"10_Other_High_Risk"],
            ["name"=>"OFW", "id"=>"11_OFW"],
            ["name"=>"Remaining Workforce", "id"=>"12_Remaining_Workforce"],
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
                    ["name"=>"Closed Settings and Institutions", "description"=>"(A1.7) Closed Settings and Institutions", "id"=>"07_A1.7"],
                ]
            ],
            [
                "name"=>"Senior citizens aged 60 years old and above",
                "description"=>"(A2) Senior citizens aged 60 years old and above",
                "id"=>"02_A2",
                "subs"=> [
                    ["name"=>"Institutionalized Senior Citizens", "description"=>"(A2.1) Institutionalized Senior Citizens", "id"=>"08_A2.1"],
                    ["name"=>"All Other Senior Citizens", "description"=>"(A2.2) All Other Senior Citizens", "id"=>"09_A2.2"]
                ]
            ],
            
            [
                "name"=>"Adult with Comorbidity",
                "description"=>"(A3) Adult with Comorbidity",
                "id"=>"03_A3",
                "subs"=> [
                    ["name"=>"Chronic Respiratory Disease", "description"=>"(A3.1) Chronic Respiratory Disease", "id"=>"10_A3.1"],
                    ["name"=>"Hypertension", "description"=>"(A3.2) Hypertension", "id"=>"11_A3.2"],
                    ["name"=>"Cardiovascular Disease", "description"=>"(A3.3) Cardiovascular Disease", "id"=>"12_A3.3"],
                    ["name"=>"Chronic Kidney Disease", "description"=>"(A3.4) Chronic Kidney Disease", "id"=>"13_A3.4"],
                    ["name"=>"Cerebrovascular Accident", "description"=>"(A3.5) Cerebrovascular Accident", "id"=>"14_A3.5"],
                    ["name"=>"Malignancy", "description"=>"(A3.6) Malignancy", "id"=>"15_A3.6"],
                    ["name"=>"Diabetes", "description"=>"(A3.7) Diabetes", "id"=>"16_A3.7"],
                    ["name"=>"Obesity", "description"=>"(A3.8) Obesity", "id"=>"17_A3.8"],
                    ["name"=>"Neurologic Disease", "description"=>"(A3.9) Neurologic Disease", "id"=>"18_A3.9"],
                    ["name"=>"Chronic Liver Disease", "description"=>"(A3.10) Chronic Liver Disease", "id"=>"19_A3.10"],
                    ["name"=>"Tuberculosis", "description"=>"(A3.11) Tuberculosis", "id"=>"20_A3.11"],
                    ["name"=>"Chronic Respiratory Tract Infection", "description"=>"(A3.12) Chronic Respiratory Tract Infection", "id"=>"21_A3.12"],
                    ["name"=>"Immunodeficiency State", "description"=>"(A3.13) Immunodeficiency State", "id"=>"22_A3.13"],
                    ["name"=>"Others", "description"=>"(A3.14) Others", "id"=>"23_A3.14"]
                ]
            ],
            [
                "name"=>"Frontline Personnel in Essential Sector",
                "description"=>"(A4) Frontline Personnel in Essential Sector",
                "id"=>"04_A4",
                "subs"=> [
                    ["name"=>"Private sector workers who work outside their homes", "description"=>"(A4.1) Private sector workers who work outside their homes", "id"=>"01_A4.1"],
                    ["name"=>"Employees in government agencies and instrumentalities, including government-owned or controlled corporations and local government units", "description"=>"(A4.2) Employees in government agencies and instrumentalities, including government-owned or controlled corporations and local government units", "id"=>"02_A4.2"],
                    ["name"=>"Informal sector workers and self-employed who work outside their homes and those working in private households", "description"=>"(A4.3) Private sector workers who work outside their homes", "id"=>"03_A4.3"],
                //     ["name"=>"Commuter transport (land, air, and sea), including logistics", "description"=>"(A4.1) Commuter transport (land, air, and sea), including logistics", "id"=>"01_A4.1"],
                //     ["name"=>"Public and private wet and dry market vendors; frontline workers in groceries, supermarkets, delivery services", "description"=>"(A4.2) Public and private wet and dry market vendors; frontline workers in groceries, supermarkets, delivery services", "id"=>"02_A4.2"],
                //     ["name"=>"Workers in manufacturing for food, beverage, medical, and pharmaceutical products", "description"=>"(A4.3) Workers in manufacturing for food, beverage, medical, and pharmaceutical products", "id"=>"03_A4.3"],
                //     ["name"=>"Frontline workers in food retail, including food service delivery", "description"=>"(A4.4) Frontline workers in food retail, including food service delivery", "id"=>"04_A4.4"],
                //     ["name"=>"Frontline workers in Financial Services in private and government", "description"=>"(A4.5) Frontline workers in Financial Services in private and government", "id"=>"05_A4.5"],
                //     ["name"=>"Frontline workers in hotels and accommodation establishment", "description"=>"(A4.6) Frontline workers in hotels and accommodation establishment", "id"=>"06_A4.6"],
                //     ["name"=>"Priests, Pastors, rabbis, imams or such other religious leaders regardless of denomination", "description"=>"(A4.7) Priests, Pastors, rabbis, imams or such other religious leaders regardless of denomination", "id"=>"07_A4.7"],
                //     ["name"=>"Security guards/personnel assigned in the establishments, offices, agencies, and organizations identified in the list of priority industry/sectors", "description"=>"(A4.8) Security guards/personnel assigned in the establishments, offices, agencies, and organizations identified in the list of priority industry/sectors", "id"=>"08_A4.8"],
                //     ["name"=>"Frontline workers in news media, both private and government", "description"=>"(A4.9) Frontline Workers in new media, both private and government", "id"=>"9_A4.9"],
                //     ["name"=>"Customer-facing personnel of telecoms, cable and internet service providers, electricity distribution, water distribution utilities", "description"=>"(A4.10) Customer-facing personnel of telecoms, cable and internet service providers, electricity distribution, water distribution utilities", "id"=>"10_A4.10"],
                //     ["name"=>"Frontline personnel in basic education and higher education institutions and agencies", "description"=>"(A4.11) Frontline personnel in basic education and higher education institutions and agencies", "id"=>"11_A4.11"],
                //     ["name"=>"Overseas Filipino workers not classified above, and scheduled for deployment within two months", "description"=>"(A4.12) Overseas Filipino workers not classified above, and scheduled for deployment within two months", "id"=>"12_A4.12"],
                //     ["name"=>"Frontline workers in law/justice, security, and social protection sectors", "description"=>"(A4.13) Frontline workers in law/justice, security, and social protection sectors", "id"=>"13_A4.13"],
                //     ["name"=>"Frontline government workers engaged in operations of government transport system, quarantine inspection, worker safety inspection and other activities indispensable to the COVID response", "description"=>"(A4.14) Frontline government workers engaged in operations of government transport system, quarantine inspection, worker safety inspection and other activities indispensable to the COVID response", "id"=>"14_A4.14"],
                //     ["name"=>"Frontline government workers in charge of tax collection; assessment of businesses for incentives; election; national ID; data collection personnel", "description"=>"(A4.15) Frontline government workers in charge of tax collection; assessment of businesses for incentives; election; national ID; data collection personnel", "id"=>"15_A4.15"],
                //     ["name"=>"Diplomatic Community and Department of Foreign Affairs personnel in consular operations", "description"=>"(A4.16) Diplomatic Community and DFA personnel in consular operations", "id"=>"16_A4.16"],
                //     ["name"=>"Department of Public Works and Highways personnel in charge of monitoring government infrastructure projects and their LGU counter parts", "description"=>"(A4.17) DPWH personnel in charge of monitoring government infrastructure projects and their LGU counter parts", "id"=>"17_A4.17"],
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

    public function indigenousValue()
    {
        return [
            ["name"=>"No", "id"=>"No"],
            ["name"=>"Abelling/Aberling", "id"=>"Abelling/Aberling"],
            ["name"=>"Aeta", "id"=>"Aeta"],
            ["name"=>"Aeta/Ayta", "id"=>"Aeta/Ayta"],
            ["name"=>"Aeta/Ayta-Sambal", "id"=>"Aeta/Ayta-Sambal"],
            ["name"=>"Aeta/Ayta-Ambala", "id"=>"Aeta/Ayta-Ambala"],
            ["name"=>"Aeta/Ayta-Abelling/Abellen", "id"=>"Aeta/Ayta-Abelling/Abellen"],
            ["name"=>"Aeta/Ayta-Mag-indi", "id"=>"Aeta/Ayta-Mag-indi"],
            ["name"=>"Aeta/Ayta-Mang-ansti", "id"=>"Aeta/Ayta-Mang-ansti"],
            ["name"=>"Aeta/Ayta-Magbukun", "id"=>"Aeta/Ayta-Magbukun"],
            ["name"=>"Agta", "id"=>"Agta"],
            ["name"=>"Agta-Labin", "id"=>"Agta-Labin"],
            ["name"=>"Agta-Dupanigan", "id"=>"Agta-Dupanigan"],
            ["name"=>"Agta Isigiran", "id"=>"Agta Isigiran"],
            ["name"=>"Agta-Cimaron", "id"=>"Agta-Cimaron"],
            ["name"=>"Agta-Tabangnon", "id"=>"Agta-Tabangnon"],
            ["name"=>"Agta-Taboy", "id"=>"Agta-Taboy"],
            ["name"=>"Agta-Abay", "id"=>"Agta-Abay"],
            ["name"=>"Agta-Dumagat", "id"=>"Agta-Dumagat"],
            ["name"=>"Agutaynen", "id"=>"Agutaynen"],
            ["name"=>"Alangan Mangyan", "id"=>"Alangan Mangyan"],
            ["name"=>"Alta", "id"=>"Alta"],
            ["name"=>"Applai", "id"=>"Applai"],
            ["name"=>"Applai-Kachakran/Kadaclan", "id"=>"Applai-Kachakran/Kadaclan"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo", "id"=>"Aromanen-Manobo/Eromanen-Manobo"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Dibabeen", "id"=>"Aromanen-Manobo/Eromanen-Manobo Dibabeen"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Direrayaan", "id"=>"Aromanen-Manobo/Eromanen-Manobo Direrayaan"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Ilianen", "id"=>"Aromanen-Manobo/Eromanen-Manobo Ilianen"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Isoroken", "id"=>"Aromanen-Manobo/Eromanen-Manobo Isoroken"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Kirenteken", "id"=>"Aromanen-Manobo/Eromanen-Manobo Kirenteken"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Lahitanen", "id"=>"Aromanen-Manobo/Eromanen-Manobo Lahitanen"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Livunganen", "id"=>"Aromanen-Manobo/Eromanen-Manobo Livunganen"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Mulitaan", "id"=>"Aromanen-Manobo/Eromanen-Manobo Mulitaan"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Pulengien", "id"=>"Aromanen-Manobo/Eromanen-Manobo Pulengien"],
            ["name"=>"Aromanen-Manobo/Eromanen-Manobo Kulmanen", "id"=>"Aromanen-Manobo/Eromanen-Manobo Kulmanen"],
            ["name"=>"Ata", "id"=>"Ata"],
            ["name"=>"Ata-Manobo", "id"=>"Ata-Manobo"],
            ["name"=>"Ati", "id"=>"Ati"],
            ["name"=>"Ayangan", "id"=>"Ayangan"],
            ["name"=>"Ayangan-Henanga", "id"=>"Ayangan-Henanga"],
            ["name"=>"Ayta", "id"=>"Ayta"],
            ["name"=>"Badjao", "id"=>"Badjao"],
            ["name"=>"Bago", "id"=>"Bago"],
            ["name"=>"Bagobo Lkata", "id"=>"Bagobo Lkata"],
            ["name"=>"Bagobo Tagabawa", "id"=>"Bagobo Tagabawa"],
            ["name"=>"Bajau", "id"=>"Bajau"],
            ["name"=>"Balangao", "id"=>"Balangao"],
            ["name"=>"Balangao - Lias", "id"=>"Balangao - Lias"],
            ["name"=>"Baliwon", "id"=>"Baliwon"],
            ["name"=>"Baliwon - Gaddang", "id"=>"Baliwon - Gaddang"],
            ["name"=>"Baliwon - Miligan", "id"=>"Baliwon - Miligan"],
            ["name"=>"Baliwon - I-sadanga", "id"=>"Baliwon - I-sadanga"],
            ["name"=>"Baliwon - Fiallig/Fialika", "id"=>"Baliwon - Fiallig/Fialika"],
            ["name"=>"Bangon Mangyan", "id"=>"Bangon Mangyan"],
            ["name"=>"Bantoanon", "id"=>"Bantoanon"],
            ["name"=>"Banwaon", "id"=>"Banwaon"],
            ["name"=>"Batak", "id"=>"Batak"],
            ["name"=>"B'laan/Blaan", "id"=>"B'laan/Blaan"],
            ["name"=>"Bontok", "id"=>"Bontok"],
            ["name"=>"Bontok-Majukayong", "id"=>"Bontok-Majukayong"],
            ["name"=>"Bugkalot/Ilongot", "id"=>"Bugkalot/Ilongot"],
            ["name"=>"Buhid Mangyan", "id"=>"Buhid Mangyan"],
            ["name"=>"Bukidnon", "id"=>"Bukidnon"],
            ["name"=>"Bukidnon - Akeanon", "id"=>"Bukidnon - Akeanon"],
            ["name"=>"Bukidnon - Pan-anayon", "id"=>"Bukidnon - Pan-anayon"],
            ["name"=>"Bukidnon - Halowodnon", "id"=>"Bukidnon - Halowodnon"],
            ["name"=>"Bukidnon - Magahat", "id"=>"Bukidnon - Magahat"],
            ["name"=>"Bukidnon - Ituman", "id"=>"Bukidnon - Ituman"],
            ["name"=>"Bukidnon - Iraynon", "id"=>"Bukidnon - Iraynon"],
            ["name"=>"Bukidnon - Tagoloanon", "id"=>"Bukidnon - Tagoloanon"],
            ["name"=>"Cagayanen", "id"=>"Cagayanen"],
            ["name"=>"Calinga", "id"=>"Calinga"],
            ["name"=>"Cuyonen/Cuyunon", "id"=>"Cuyonen/Cuyunon"],
            ["name"=>"Diangan", "id"=>"Diangan"],
            ["name"=>"Dibabawon", "id"=>"Dibabawon"],
            ["name"=>"Dumagat", "id"=>"Dumagat"],
            ["name"=>"Dumagat - Remontado", "id"=>"Dumagat - Remontado"],
            ["name"=>"Dumagat - Kabolowen", "id"=>"Dumagat - Kabolowen"],
            ["name"=>"Dumagat - Tagebolus", "id"=>"Dumagat - Tagebolus"],
            ["name"=>"Dumagat - Edimala", "id"=>"Dumagat - Edimala"],
            ["name"=>"Eskaya", "id"=>"Eskaya"],
            ["name"=>"Gaddang", "id"=>"Gaddang"],
            ["name"=>"Gubatnon-Ratagnon Mangyan", "id"=>"Gubatnon-Ratagnon Mangyan"],
            ["name"=>"Hanunuo Mangyan", "id"=>"Hanunuo Mangyan"],
            ["name"=>"Higaonon/Higa-onon", "id"=>"Higaonon/Higa-onon"],
            ["name"=>"Higaonon - Tagoloanon", "id"=>"Higaonon - Tagoloanon"],
            ["name"=>"Ibanag", "id"=>"Ibanag"],
            ["name"=>"Ibatan", "id"=>"Ibatan"],
            ["name"=>"Ibaloy", "id"=>"Ibaloy"],
            ["name"=>"Ibukid", "id"=>"Ibukid"],
            ["name"=>"Ifugao", "id"=>"Ifugao"],
            ["name"=>"Imalawa", "id"=>"Imalawa"],
            ["name"=>"Iraya Mangyan", "id"=>"Iraya Mangyan"],
            ["name"=>"Isinai", "id"=>"Isinai"],
            ["name"=>"Isnag", "id"=>"Isnag"],
            ["name"=>"Isneg", "id"=>"Isneg"],
            ["name"=>"Isneg/Isnag", "id"=>"Isneg/Isnag"],
            ["name"=>"Itawes", "id"=>"Itawes"],
            ["name"=>"Itneg", "id"=>"Itneg"],
            ["name"=>"Itneg/Tinguian", "id"=>"Itneg/Tinguian"],
            ["name"=>"Itneg/Tinguian - Adasen", "id"=>"Itneg/Tinguian - Adasen"],
            ["name"=>"Itneg/Tinguian - Balatok", "id"=>"Itneg/Tinguian - Balatok"],
            ["name"=>"Itneg/Tinguian - Banao", "id"=>"Itneg/Tinguian - Banao"],
            ["name"=>"Itneg/Tinguian - Belwang", "id"=>"Itneg/Tinguian - Belwang"],
            ["name"=>"Itneg/Tinguian - Binongan", "id"=>"Itneg/Tinguian - Binongan"],
            ["name"=>"Itneg/Tinguian - Gubang", "id"=>"Itneg/Tinguian - Gubang"],
            ["name"=>"Itneg/Tinguian - Inlaud", "id"=>"Itneg/Tinguian - Inlaud"],
            ["name"=>"Itneg/Tinguian - Mabaka", "id"=>"Itneg/Tinguian - Mabaka"],
            ["name"=>"Itneg/Tinguian - Maeng", "id"=>"Itneg/Tinguian - Maeng"],
            ["name"=>"Itneg/Tinguian - Masadiit", "id"=>"Itneg/Tinguian - Masadiit"],
            ["name"=>"Itneg/Tinguian - Muyadan", "id"=>"Itneg/Tinguian - Muyadan"],
            ["name"=>"Ivatan", "id"=>"Ivatan"],
            ["name"=>"Iwak", "id"=>"Iwak"],
            ["name"=>"Kabihug", "id"=>"Kabihug"],
            ["name"=>"Kabihug - Manide", "id"=>"Kabihug - Manide"],
            ["name"=>"Kagan/Kalagan", "id"=>"Kagan/Kalagan"],
            ["name"=>"Kalanguya", "id"=>"Kalanguya"],
            ["name"=>"Kalanguya - Yattuka", "id"=>"Kalanguya - Yattuka"],
            ["name"=>"Kalanguya-Ikalahan", "id"=>"Kalanguya-Ikalahan"],
            ["name"=>"Kalinga", "id"=>"Kalinga"],
            ["name"=>"Kalinga - Lubo", "id"=>"Kalinga - Lubo"],
            ["name"=>"Kalinga - Mangali", "id"=>"Kalinga - Mangali"],
            ["name"=>"Kalinga - Taloctoc", "id"=>"Kalinga - Taloctoc"],
            ["name"=>"Kalinga - Pangol", "id"=>"Kalinga - Pangol"],
            ["name"=>"Kalinga - Gaang", "id"=>"Kalinga - Gaang"],
            ["name"=>"Kalinga - Dacalan", "id"=>"Kalinga - Dacalan"],
            ["name"=>"Kalinga - Guilayon", "id"=>"Kalinga - Guilayon"],
            ["name"=>"Kalinga - Nanong", "id"=>"Kalinga - Nanong"],
            ["name"=>"Kalinga - Dallac", "id"=>"Kalinga - Dallac"],
            ["name"=>"Kalinga - Biga", "id"=>"Kalinga - Biga"],
            ["name"=>"Kalinga - Tobog", "id"=>"Kalinga - Tobog"],
            ["name"=>"Kalinga - Gaddang", "id"=>"Kalinga - Gaddang"],
            ["name"=>"Kalinga - Culminga", "id"=>"Kalinga - Culminga"],
            ["name"=>"Kalinga - Malbong", "id"=>"Kalinga - Malbong"],
            ["name"=>"Kalinga - Minanga", "id"=>"Kalinga - Minanga"],
            ["name"=>"Kalinga - Dao-Angan", "id"=>"Kalinga - Dao-Angan"],
            ["name"=>"Kalinga - Banao", "id"=>"Kalinga - Banao"],
            ["name"=>"Kalinga - Salegseg", "id"=>"Kalinga - Salegseg"],
            ["name"=>"Kalinga - Gubang", "id"=>"Kalinga - Gubang"],
            ["name"=>"Kalinga - Mabaca", "id"=>"Kalinga - Mabaca"],
            ["name"=>"Kalinga - Poswoy", "id"=>"Kalinga - Poswoy"],
            ["name"=>"Kalinga - Ab-abaan", "id"=>"Kalinga - Ab-abaan"],
            ["name"=>"Kalinga - Buaya", "id"=>"Kalinga - Buaya"],
            ["name"=>"Kalinga - Balatoc", "id"=>"Kalinga - Balatoc"],
            ["name"=>"Kalinga - Dangtalan", "id"=>"Kalinga - Dangtalan"],
            ["name"=>"Kalinga - Cagaluan", "id"=>"Kalinga - Cagaluan"],
            ["name"=>"Kalinga - Balinciagao", "id"=>"Kalinga - Balinciagao"],
            ["name"=>"Kalinga - Ableg/Dalupa", "id"=>"Kalinga - Ableg/Dalupa"],
            ["name"=>"Kalinga - Limos", "id"=>"Kalinga - Limos"],
            ["name"=>"Kalinga - Pinukpuk", "id"=>"Kalinga - Pinukpuk"],
            ["name"=>"Kalinga - Magaogao", "id"=>"Kalinga - Magaogao"],
            ["name"=>"Kalinga - Aciga", "id"=>"Kalinga - Aciga"],
            ["name"=>"Kalinga - Ballayangan", "id"=>"Kalinga - Ballayangan"],
            ["name"=>"Kalinga - Ammacian", "id"=>"Kalinga - Ammacian"],
            ["name"=>"Kalinga - Dugpa", "id"=>"Kalinga - Dugpa"],
            ["name"=>"Kalinga - Uma", "id"=>"Kalinga - Uma"],
            ["name"=>"Kalinga - Luluagan", "id"=>"Kalinga - Luluagan"],
            ["name"=>"Kalinga - Mabongtot", "id"=>"Kalinga - Mabongtot"],
            ["name"=>"Kalinga - Tanglag", "id"=>"Kalinga - Tanglag"],
            ["name"=>"Kalinga - Tulgao", "id"=>"Kalinga - Tulgao"],
            ["name"=>"Kalinga - Dananao", "id"=>"Kalinga - Dananao"],
            ["name"=>"Kalinga - Tongrayan", "id"=>"Kalinga - Tongrayan"],
            ["name"=>"Kalinga - Bangad", "id"=>"Kalinga - Bangad"],
            ["name"=>"Kalinga - Basao", "id"=>"Kalinga - Basao"],
            ["name"=>"Kalinga - Guina-Ang", "id"=>"Kalinga - Guina-Ang"],
            ["name"=>"Kalinga - Sumadel", "id"=>"Kalinga - Sumadel"],
            ["name"=>"Kalinga - Butbut", "id"=>"Kalinga - Butbut"],
            ["name"=>"Kamiguin", "id"=>"Kamiguin"],
            ["name"=>"Kankanaey", "id"=>"Kankanaey"],
            ["name"=>"Kankanaey - Hak'ki", "id"=>"Kankanaey - Hak'ki"],
            ["name"=>"Karao", "id"=>"Karao"],
            ["name"=>"Karulano", "id"=>"Karulano"],
            ["name"=>"Kolibugan", "id"=>"Kolibugan"],
            ["name"=>"Lambanguian", "id"=>"Lambanguian"],
            ["name"=>"Malaueg", "id"=>"Malaueg"],
            ["name"=>"Mamanwa", "id"=>"Mamanwa"],
            ["name"=>"Mandaya", "id"=>"Mandaya"],
            ["name"=>"Mangguangan", "id"=>"Mangguangan"],
            ["name"=>"Mangyan", "id"=>"Mangyan"],
            ["name"=>"Mansaka", "id"=>"Mansaka"],
            ["name"=>"Manobo", "id"=>"Manobo"],
            ["name"=>"Manobo - Pulanguinon", "id"=>"Manobo - Pulanguinon"],
            ["name"=>"Manobo - Dunggoanon", "id"=>"Manobo - Dunggoanon"],
            ["name"=>"Manobo - Kirenteken", "id"=>"Manobo - Kirenteken"],
            ["name"=>"Manobo - Aromanon", "id"=>"Manobo - Aromanon"],
            ["name"=>"Manobo-Blit", "id"=>"Manobo-Blit"],
            ["name"=>"Manobo-Blit - Tasaday", "id"=>"Manobo-Blit - Tasaday"],
            ["name"=>"Manobo-Dulangan", "id"=>"Manobo-Dulangan"],
            ["name"=>"Manobo-Dulangan - Lambangian", "id"=>"Manobo-Dulangan - Lambangian"],
            ["name"=>"Ubo Monuvu/Manobo-Ubo/Ubo Manobo/Ubo Manuvu/Ubo Menuvu", "id"=>"Ubo Monuvu/Manobo-Ubo/Ubo Manobo/Ubo Manuvu/Ubo Menuvu"],
            ["name"=>"Matigsalog", "id"=>"Matigsalog"],
            ["name"=>"Molbog", "id"=>"Molbog"],
            ["name"=>"Obu-Manuvu", "id"=>"Obu-Manuvu"],
            ["name"=>"Palawan-o", "id"=>"Palawan-o"],
            ["name"=>"Palawan-o - Tao't Bato", "id"=>"Palawan-o - Tao't Bato"],
            ["name"=>"Palawan-o - Ken-ey", "id"=>"Palawan-o - Ken-ey"],
            ["name"=>"Pan-ayanon", "id"=>"Pan-ayanon"],
            ["name"=>"Panay Bukidnon", "id"=>"Panay Bukidnon"],
            ["name"=>"Parananum", "id"=>"Parananum"],
            ["name"=>"Sama", "id"=>"Sama"],
            ["name"=>"Sama Badjao", "id"=>"Sama Badjao"],
            ["name"=>"Sama Bangingi", "id"=>"Sama Bangingi"],
            ["name"=>"Sama Delaut", "id"=>"Sama Delaut"],
            ["name"=>"Sibuyan Mangyan-Tagabukid", "id"=>"Sibuyan Mangyan-Tagabukid"],
            ["name"=>"Subanen/Subanon - Kolibugan", "id"=>"Subanen/Subanon - Kolibugan"],
            ["name"=>"Tagakaulo", "id"=>"Tagakaulo"],
            ["name"=>"Tagbanua", "id"=>"Tagbanua"],
            ["name"=>"Tagbanua-Calamian", "id"=>"Tagbanua-Calamian"],
            ["name"=>"Tagbanua Tandulanen", "id"=>"Tagbanua Tandulanen"],
            ["name"=>"Tadyawan Mangyan", "id"=>"Tadyawan Mangyan"],
            ["name"=>"Talaandig", "id"=>"Talaandig"],
            ["name"=>"T'boli/Tboli", "id"=>"T'boli/Tboli"],
            ["name"=>"Tau-buid Mangyan", "id"=>"Tau-buid Mangyan"],
            ["name"=>"T'duray/Teduray", "id"=>"T'duray/Teduray"],
            ["name"=>"Tigwahanon", "id"=>"Tigwahanon"],
            ["name"=>"Tinananen", "id"=>"Tinananen"],
            ["name"=>"Tingguian", "id"=>"Tingguian"],
            ["name"=>"Tuwali", "id"=>"Tuwali"],
            ["name"=>"Tuwali - Kele-i", "id"=>"Tuwali - Kele-i"],
            ["name"=>"Umayamnon", "id"=>"Umayamnon"],
            ["name"=>"Yakan", "id"=>"Yakan"],
            ["name"=>"Yapayao", "id"=>"Yapayao"],
            ["name"=>"Yogad", "id"=>"Yogad"],
        ];
    }
    
    public function deferralValue()
    {
        return [
            ["name"=>"NONE", "id"=>"NONE"],
            ["name"=>"Age Requirement", "id"=>"DC01_Age Requirement"],
            ["name"=>"1st Dose Other Brand", "id"=>"DC02_1st Dose Other Brand"],
            ["name"=>"Allergy to Vaccine component", "id"=>"DC03_Allergy to Vaccine component"],
            ["name"=>"Severe Allergy to 1st Dose", "id"=>"DC04_Severe Allergy to 1st Dose"],
            ["name"=>"Allergy/Asthma, No monitor", "id"=>"DC05_Allergy/Asthma, No monitor"],
            ["name"=>"History of Anaphylaxis", "id"=>"DC06_History of Anaphylaxis"],
            ["name"=>"Bleeding disorders/Taking anti-coagulants", "id"=>"DC07_Bleeding disorders/Taking anti-coagulants"],
            ["name"=>"Symptomatic for COVID-19 Infection", "id"=>"DC08_Symptomatic for COVID-19 Infection"],
            ["name"=>"High SBP, DBP, Organ Damage", "id"=>"DC09_High SBP, DBP, Organ Damage"],
            ["name"=>"Covid-19 Exposure", "id"=>"DC10_Covid-19 Exposure"],
            ["name"=>"Ongoing Covid-19 Treatment", "id"=>"DC11_Ongoing Covid-19 Treatment"],
            ["name"=>"Attach, Admissions, Meds Change", "id"=>"DC12_Attach, Admissions, Meds Change"],
            ["name"=>"Other Vaccine/s within 2 weeks", "id"=>"DC13_Other Vaccine/s within 2 weeks"],
            ["name"=>"Plasma or Antibodies", "id"=>"DC14_Plasma or Antibodies"],
            ["name"=>"Pregnant or Breastfeeding", "id"=>"DC15_Pregnant or Breastfeeding"],
            ["name"=>"No Med Clearance for Comorbidity", "id"=>"DC16_No Med Clearance for Comorbidity"],
        ];
    }

    public function adverseEventsValue()
    {
        return [
            ["name"=>"NONE", "id"=>"NONE"],
            ["name"=>"General Symptoms", "id"=>"AE01_General Symptoms"],
            ["name"=>"Cardiac Symptoms", "id"=>"AE02_Cardiac Symptoms"],
            ["name"=>"Ear Symptoms", "id"=>"AE03_Ear Symptoms"],
            ["name"=>"Endocrine Symptoms", "id"=>"AE04_Endocrine Symptoms"],
            ["name"=>"Examinations", "id"=>"AE05_Examinations"],
            ["name"=>"Eye Symptoms", "id"=>"AE06_Eye Symptoms"],
            ["name"=>"Gastrointestinal Symptoms", "id"=>"AE07_Gastrointestinal Symptoms"],
            ["name"=>"Hepatobiliary Symptoms", "id"=>"AE08_Hepatobiliary Symptoms"],
            ["name"=>"Immune System Symptoms", "id"=>"AE09_Immune System Symptoms"],
            ["name"=>"Infections", "id"=>"AE10_Infections"],
            ["name"=>"Nutrition-Related Symptoms", "id"=>"AE11_Nutrition-Related Symptoms"],
            ["name"=>"Musculoskeletal Symptoms", "id"=>"AE12_Musculoskeletal Symptoms"],
            ["name"=>"Neurological Symptoms", "id"=>"AE13_Neurological Symptoms"],
            ["name"=>"Perinatal Conditions", "id"=>"AE14_Perinatal Conditions"],
            ["name"=>"Procedural Symptoms", "id"=>"AE15_Procedural Symptoms"],
            ["name"=>"Psychiatric Symptoms", "id"=>"AE16_Psychiatric Symptoms"],
            ["name"=>"Renal and Urinary Symptoms", "id"=>"AE17_Renal and Urinary Symptoms"],
            ["name"=>"Reproductive Symptoms", "id"=>"AE18_Reproductive Symptoms"],
            ["name"=>"Respiratory Symptoms", "id"=>"AE19_Respiratory Symptoms"],
            ["name"=>"Skin Symptoms", "id"=>"AE20_Skin Symptoms"],
            ["name"=>"Lymphatic System Symptoms", "id"=>"AE21_Lymphatic System Symptoms"],
            ["name"=>"Vascular Symptoms", "id"=>"AE22_Vascular Symptoms"],
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
        $brands = config('constants.brands');

        return $brands;
    }

    public function vaccinationSessionValue()
    {
        $sessions = config('constants.sessions');

        return $sessions;
    }

    public function groupsValue()
    {
        $groups = config('constants.groups');

        return $groups;
    }

    public function municipalityValue()
    {
        $groups = config('constants.municipalities');

        return $groups;
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