<?php

return [

    /**
     * Groups
     */
    'groups' => [
        [
            'id' => 1,
            'name' => 'Administrator'
        ],
        [
            'id' => 2,
            'name' => 'Team Leader'
        ],
        [
            'id' => 3,
            'name' => 'Counseling Nurse'
        ],
        [
            'id' => 4,
            'name' => 'Encoder'
        ],
        [
            'id' => 5,
            'name' => 'Vaccinator'
        ],        
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
            ]
        ],
        [
            'id' => 2,
            'name' => 'Moderna Barda NIAID',
            'vaccines' => [
                [
                    'id' => 2,
                    'name' => 'Moderna COVID-19 Vaccine (mRNA-1273)'
                ]
            ]
        ],
        [
            'id' => 3,
            'name' => 'BARDA, OWS',
            'vaccines' => [
                [
                    'id' => 3,
                    'name' => 'COVID-19 Vaccine AstraZeneca (AZD1222)'
                ]
            ]
        ],
        [
            'id' => 4,
            'name' => 'Gamaleya Research Institute, Acellena Contract Drug Research and Development',
            'vaccines' => [
                [
                    'id' => 4,
                    'name' => 'Sputnik V'
                ]
            ]            
        ],
        [
            'id' => 5,
            'name' => 'Johnson & Johnson',
            'vaccines' => [
                [
                    'id' => 5,
                    'name' => 'COVID-19 Vaccine Janssen (JNJ-78436735; Ad26.COV2.S)'
                ]
            ]    
        ],
        [
            'id' => 6,
            'name' => 'Sinovac',
            'vaccines' => [
                [
                    'id' => 6,
                    'name' => 'CoronaVac'
                ]
            ] 
        ],
        [
            'id' => 7,
            'name' => 'Bharat Biotech, ICMR',
            'vaccines' => [
                [
                    'id' => 7,
                    'name' => 'Covaxin'
                ]
            ] 
        ],
        [
            'id' => 8,
            'name' => 'Federal Budgetary Research Institution State Research Center of Virology and Biotechnology',
            'vaccines' => [
                [
                    'id' => 8,
                    'name' => 'EpiVacCorona'
                ]
            ] 
        ],
        [
            'id' => 9,
            'name' => 'Chumakov Federal Scientific Center for Research and Development of Immune and Biological Products',
            'vaccines' => [
                [
                    'id' => 9,
                    'name' => 'CoviVac'
                ]
            ]
        ],
        [
            'id' => 10,
            'name' => 'Novavax, Inc.',
            'vaccines' => [
                [
                    'id' => 10,
                    'name' => 'Novavax COVID-19'
                ]
            ]
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
        ["key"=>1,"description"=>"Age more than 16 years old?","value"=>false],
        ["key"=>2,"description"=>"Has no allergies to PEG or polysorbate?","value"=>false],
        ["key"=>3,"description"=>"Has no severe allergic reaction after the 1st dose of the vaccine?","value"=>false],
        ["key"=>4,"description"=>"Has no allergy to food, egg, medicines, and no asthma?","value"=>false],
        ["key"=>5,"description"=>"Has no history of bleeding disorders or currently taking anti-coagulants?","value"=>false],
        ["key"=>6,"description"=>"If with bleeding history, is a gauge 23 - 25 syringe available for injection?","value"=>false],
        ["key"=>7,"description"=>"Has no history of exposure to a confirmed or suspected COVID-19 case in the past 2 weeks?","value"=>false],
        ["key"=>8,"description"=>"Has not been previously treated for COVID-19 in the past 90 days?","value"=>false],
        ["key"=>9,"description"=>"Has not received any vaccine in the past 2 weeks?","value"=>false],
        ["key"=>10,"description"=>"Has not received convalescent plasma or monoclonal antibodies for COVID-19 in the past 90 days?","value"=>false],
        ["key"=>11,"description"=>"Not Pregnant?","value"=>false],
        ["key"=>12,"description"=>"If pregnant, 2nd or 3rd Trimester?","value"=>false],
        ["key"=>13,"description"=>"Does not have any of the following: HIV, Cancer/ Malignancy, Underwent Transplant, Under Steroid Medication/ Treatment, Bed Ridden, terminal illness, less than 6 months prognosis","value"=>false],
        ["key"=>14,"description"=>"If with mentioned condition/s, specify.","value"=>false],
        ["key"=>15,"description"=>"If with mentioned condition, has presented medical clearance prior to vaccination day?","value"=>false],
    ],

    'post_assessments' => [
        ["key"=>1,"description"=>"If with allergy or asthma, will the vaccinator able to monitor the patient for 30 minutes?","value"=>false],
        ["key"=>2,"description"=>"Does not manifest any of the following symptoms: Fever/chills, Headache, Cough, Colds, Sore throat,  Myalgia, Fatigue, Weakness, Loss of smell/taste, Diarrhea, Shortness of breath/ difficulty in breathing","value"=>false],
        ["key"=>3,"description"=>"If manifesting any of the mentioned symptom/s, specify all that apply","value"=>false],
    ],

];