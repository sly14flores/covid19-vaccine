<?php

return [

    /**
     * Groups
     */
    'groups' => [
        [
            'id' => 1,
            'name' => 'Administrator',
            'professions' => []
        ],
        [
            'id' => 2,
            'name' => 'Team Leader',
            'professions' => []
        ],
        [
            'id' => 3,
            'name' => 'Counseling Nurse',
            'professions' => []
        ],
        [
            'id' => 4,
            'name' => 'Encoder',
            'professions' => []
        ],
        [
            'id' => 5,
            'name' => 'Vaccinator',
            'professions' => [
                ['id' => 'Doctor', 'name' => 'Doctor'],
                ['id' => 'Nurse', 'name' => 'Nurse'],
                ['id' => 'Pharmacist', 'name' => 'Pharmacist'],
                ['id' => 'Midwife', 'name' => 'Midwife'],
            ]
        ],
        [
            'id' => 6,
            'name' => 'Vaccine Operation Managers',
            'professions' => []
        ],
        [
            'id' => 7,
            'name' => 'Storage and Logistics Officers',
            'professions' => []
        ],
        [
            'id' => 8,
            'name' => 'Surveillance and AEFI Officers',
            'professions' => []
        ],
        [
            'id' => 9,
            'name' => 'Advocacy and Demand Generation Officers',
            'professions' => []
        ],
        [
            'id' => 10,
            'name' => 'Registration and Data Manager Officers',
            'professions' => []
        ]
    ],

    'brands' => [
        [
            'id' => 1,
            'name' => 'Pfizer, BioNTech Fosun Pharma',
            'vaccines' => [
                [
                    'id' => 1,
                    'name' => 'Pfizer Comirnaty (BNT162b2)'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'Pfizer',
        ],
        [
            'id' => 2,
            'name' => 'Moderna Barda NIAID',
            'vaccines' => [
                [
                    'id' => 2,
                    'name' => 'Moderna COVID-19 Vaccine (mRNA-1273)'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'Moderna',         
        ],
        [
            'id' => 3,
            'name' => 'BARDA, OWS',
            'vaccines' => [
                [
                    'id' => 3,
                    'name' => 'COVID-19 Vaccine AstraZeneca (AZD1222)'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'BARDA',       
        ],
        [
            'id' => 4,
            'name' => 'Gamaleya Research Institute, Acellena Contract Drug Research and Development',
            'vaccines' => [
                [
                    'id' => 4,
                    'name' => 'Sputnik V'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'Gamaleya',
        ],
        [
            'id' => 5,
            'name' => 'Johnson & Johnson',
            'vaccines' => [
                [
                    'id' => 5,
                    'name' => 'COVID-19 Vaccine Janssen (JNJ-78436735; Ad26.COV2.S)'
                ]
            ],
            'dosages' => 1,
            'shortname' => 'Johnson & Johnson',
        ],
        [
            'id' => 6,
            'name' => 'Sinovac',
            'vaccines' => [
                [
                    'id' => 6,
                    'name' => 'CoronaVac'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'Sinovac',
        ],
        [
            'id' => 7,
            'name' => 'Bharat Biotech, ICMR',
            'vaccines' => [
                [
                    'id' => 7,
                    'name' => 'Covaxin'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'Bharat Biotech',
        ],
        [
            'id' => 8,
            'name' => 'Federal Budgetary Research Institution State Research Center of Virology and Biotechnology',
            'vaccines' => [
                [
                    'id' => 8,
                    'name' => 'EpiVacCorona'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'Federal',
        ],
        [
            'id' => 9,
            'name' => 'Chumakov Federal Scientific Center for Research and Development of Immune and Biological Products',
            'vaccines' => [
                [
                    'id' => 9,
                    'name' => 'CoviVac'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'Chumakov',       
        ],
        [
            'id' => 10,
            'name' => 'Novavax, Inc.',
            'vaccines' => [
                [
                    'id' => 10,
                    'name' => 'Novavax COVID-19'
                ]
            ],
            'dosages' => 2,
            'shortname' => 'Novavax',   
        ],
        [
            'id' => 11,
            'name' => 'Oxford',
            'vaccines' => [
                [
                    'id' => 10,
                    'name' => 'Oxford Astrazenica'
                ]
            ],
            'dosages' => 3,
            'shortname' => 'Oxford',
        ],                  
    ],

    'sessions' => [
        [
            'id' => 1,
            'name' => 'Routine session',
        ],
        [
            'id' => 2,
            'name' => 'Clinic',
        ],
        [
            'id' => 3,
            'name' => 'Mass Campaign',
        ],
        [
            'id' => 4,
            'name' => 'School based',
        ],
        [
            'id' => 5,
            'name' => 'Others',
        ],        
    ],

    'pre_assessments' => [
        ["key"=>1,"description"=>"Below 18 years old?","value"=>false],
        ["key"=>2,"description"=>"Has allergy to polysorbate or any other components (L-Histidine, L-Histidine hydrochloride monohydrate, Magnesium chloride hexahydrate, Polysorbate 80, Ethanol, Sucrose, Sodium chloride, Disodium edetate, Water for injections) of the vaccine?","value"=>false],
        ["key"=>3,"description"=>"Had severe allergic reaction after the 1st dose of the vaccine?","value"=>false],
        ["key"=>4,"description"=>"Allergy to food, egg, medicines? has asthma?","value"=>false],
        ["key"=>5,"description"=>"If with allergy or asthma, will monitoring the patient for 30 minutes be a problem?","value"=>false],
        ["key"=>6,"description"=>"Has history of bleeding disorders or currently taking anti-coagulants?","value"=>false],
        ["key"=>7,"description"=>"If with bleeding history or currently taking anti-coagulants, is there a problem securing a gauge 23 - 25 syringe for injection?","value"=>false],
        ["key"=>8,"description"=>"Manifests any one of the following symptoms?","value"=>false,
            "subs" => [
                ["key"=>1,"description"=>"Fever/chills","value"=>false],
                ["key"=>2,"description"=>"Headache","value"=>false],
                ["key"=>3,"description"=>"Cough","value"=>false],
                ["key"=>4,"description"=>"Colds","value"=>false],
                ["key"=>5,"description"=>"Sore Throat","value"=>false],
                ["key"=>6,"description"=>"Myalgia","value"=>false],
                ["key"=>7,"description"=>"Fatigue","value"=>false],
                ["key"=>8,"description"=>"Weakness","value"=>false],
                ["key"=>9,"description"=>"Loss of smell/taste","value"=>false],
                ["key"=>10,"description"=>"Diarrhea","value"=>false],
                ["key"=>11,"description"=>"Shortness of breath/difficult in breathing","value"=>false],
                ["key"=>12,"description"=>"Rashes","value"=>false],
            ]
        ],
        ["key"=>9,"description"=>"Has history of exposure to a confirmed or suspected COVID-19 in the past 14 days?","value"=>false],
        ["key"=>10,"description"=>"Previously treated for COVID-19 in the past 90 days","value"=>false],
        ["key"=>11,"description"=>"Has recieved any vaccine in the past 14 days or plans to recieve another vaccine 14 days following vaccination?","value"=>false],
        ["key"=>12,"description"=>"Pregnant?","value"=>false],
        ["key"=>13,"description"=>"Has any of the following diseases or health condition?","value"=>false,
            "subs"  =>[
                ["key"=>1,"description"=>"HIV","value"=>false],
                ["key"=>2,"description"=>"Cancer/Malignancy","value"=>false],
                ["key"=>3,"description"=>"Underwent Transplant","value"=>false],
                ["key"=>4,"description"=>"Under Steroid Medication/Treatment","value"=>false],
                ["key"=>5,"description"=>"Bed ridden, terminal illness, less than 6 months prognosis","value"=>false],
                ["key"=>6,"description"=>"Autoimmune disease","value"=>false]
            ]
        ],
    ],

    'post_assessments' => [
        ["key"=>1,"description"=>"If with allergy or asthma, will the vaccinator able to monitor the patient for 30 minutes?","value"=>false],
        ["key"=>2,"description"=>"Does not manifest any of the following symptoms: Fever/chills, Headache, Cough, Colds, Sore throat,  Myalgia, Fatigue, Weakness, Loss of smell/taste, Diarrhea, Shortness of breath/ difficulty in breathing","value"=>false],
        ["key"=>3,"description"=>"If manifesting any of the mentioned symptom/s, specify all that apply","value"=>false],
    ],

    'total_population' => 827310,

];