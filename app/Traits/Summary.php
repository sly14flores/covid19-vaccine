<?php

namespace App\Traits;

use App\Models\Survey;
use App\Models\Registration;
use App\Models\Vaccine;
use App\Models\Dosage;
use App\Models\Hospital;

use Carbon\Carbon;

use App\Traits\UserLocation;
use Illuminate\Database\Eloquent\Builder;

trait Summary
{

    use UserLocation;

    public static function surveys($filter)
    {
        $wheres = [];
        if (self::userNotAdmin()) {
            $location = self::userLocationDesc();
            $wheres[] = ['town_city',$location];
        }

        $startFilter = Carbon::parse($filter['start'])->format("Y-m-d 00:00:00");
        $endFilter = Carbon::parse($filter['end'])->addDays(1)->format("Y-m-d 00:00:00");

        $startFilterChart = Carbon::parse($filter['start_chart'])->format("Y-m-d 00:00:00");
        $endFilterChart = Carbon::parse($filter['end_chart'])->addDays(1)->format("Y-m-d 00:00:00");

        $surveysChart = Survey::where($wheres)->whereBetween('created_at',[$startFilterChart,$endFilterChart])->get();
        $surveys = Survey::where($wheres)->whereBetween('created_at',[$startFilter,$endFilter])->get();

        // $collect = collect($surveys);
        // $surveys = Survey::all();

        $startDay = Carbon::parse($filter['start_chart'])->format("Y-m-d");
        $endDay = Carbon::parse($filter['end_chart'])->format("Y-m-d");
        $day = $startDay;

        $line_chart_labels = [];
        $total_responses_values = [];
        $total_interested = [];
        $total_not_interested = [];

        while (strtotime($day) <= strtotime($endDay)) {

            $line_chart_labels[] = Carbon::parse($day)->format("M j");

            $total_responses_values[] = $surveysChart->filter(function($value) use ($day) {
                return (Carbon::parse($value['created_at'])->format('Y-m-d')===$day);
            })->count();
            
            $total_interested[] = $surveysChart->where('yes_vaccine','1')->filter(function($value) use ($day) {
                return (Carbon::parse($value['created_at'])->format('Y-m-d')===$day);
            })->count();

            $total_not_interested[] = $surveysChart->where('no_vaccine','1')->filter(function($value) use ($day) {
                return (Carbon::parse($value['created_at'])->format('Y-m-d')===$day);
            })->count();

            $day = Carbon::parse($day)->addDays(1)->format("Y-m-d");

        }

        $total_responses = $surveys->count();

        $male = $surveys->where('gender','Male')->count();
        $female = $surveys->where('gender','Female')->count();
        $gender = [
            [
                'male'=>$male,
                'female'=>$female,
            ]
        ];

        $population_group = [];
        $population_groups = [
            "frontline_health_workers"=>"Frontline health workers",
            "senior_citizens"=>"Senior citizens",
            "uniformed_personnel"=>"Uniformed personnel (PNP, AFP, PCG, BFP, BJMP, ETC)",
            "teachers"=>"Teachers",
            "social_workers"=>"Social Workers",
            "government_employees"=>"Government Employees",
            "agriculture_group"=>"Agriculture Group",
            "food_industry"=>"Food Industry",
            "tranportation"=>"Transportation",
            "tourism"=>"Tourism",
            "persons_deprived_of_liberty"=>"Persons Deprived of Liberty",
            "persons_with_disability"=>"Persons With Disability",
            "ofw"=>"OFW",
            "others_population_group"=>"Others",
        ];
        foreach ($population_groups as $key => $pg) {
            $population_group[] = [
                "description"=>$pg,
                "value"=>$surveys->where($key,1)->count(),
                "yes"=>$surveys->where($key,1)->where('yes_vaccine',1)->count(),
                "no"=>$surveys->where($key,1)->where('no_vaccine',1)->count()
            ];
        }

        $municipality = [];
        $municipalities = [
            "AGOO",
            "ARINGAY",
            "BACNOTAN",
            "BAGULIN",
            "BALAOAN",
            "BANGAR",
            "BAUANG",
            "BURGOS",
            "CABA",
            "LUNA",
            "NAGUILIAN",
            "PUGO",
            "ROSARIO",
            "SAN FERNANDO CITY",
            "SAN GABRIEL",
            "SAN JUAN",
            "SANTO TOMAS",
            "SANTOL",
            "SUDIPEN",
            "TUBAO",
        ];

        foreach ($municipalities as $m) {
            $municipality[] = [
                "description"=>$m,
                "value"=>$surveys->where('town_city',$m)->count()
            ];
        }        

        $comorbidity = [];
        $comorbidities = [
            "lung_disease"=>"Lung Disease such as Asthma, pulmonary tuberculosis, etc",
            "heart_disease"=>"Heart Disease",
            "kidney_disease"=>"Kidney Disease",
            "diabetes"=>"Diabetes",
            "high_blood_pressure"=>"High Blood Pressure",
            "cancer"=>"Cancer",
            "leukemia"=>"Leukemia",
            "hiv"=>"HIV",
            "mental_problem"=>"Mental Problem / Seizure disorder",
            "others_health_condition"=>"Others",
            "none_of_the_above"=>"None of the above",
        ];

        foreach ($comorbidities as $key => $c) {
            $comorbidity[] = [
                "description"=>$c,
                "value"=>$surveys->where($key,1)->count()
            ];
        }             

        $current_pregnancy = [];
        $pregnancy_status = [
            "yes_currently_pregnant"=>"Pregnant",
            "no_currently_pregnant"=>"Not Pregnant",
            "not_sure_currently_pregnant"=>"Not Sure",
        ];
        foreach ($pregnancy_status as $key => $p) {
            $current_pregnancy[0][$key] = $surveys->where($key,1)->count();
        }

        $planning_pregnant = [];
        $planning_pregnants = [
            "yes_pregnant_baby"=>"Yes",
            "no_pregnant_baby"=>"No",
        ];
        foreach ($planning_pregnants as $key => $pp) {
            $planning_pregnant[0][$key] = $surveys->where($key,1)->count();
        }

        $interested = [];
        $vaccinated = [
            "yes_vaccine"=>"Yes",
            "no_vaccine"=>"No",
        ];
        foreach ($vaccinated as $key => $v) {
            $interested[0][$key] = $surveys->where($key,1)->count();
        }
        $yes_vaccine = $surveys->where('yes_vaccine',1)->count();
        $no_vaccine = $surveys->where('no_vaccine',1)->count();

        $reason = [];
        $reasons = [
            'enough_information'=>"I don’t know enough information on vaccines",
            'vaccines_not_thoroughly_studied'=>"I think that the vaccines are not thoroughly studied",
            'efficacy_rate_reason'=>"Efficacy of the vaccine",
            'safety_reason'=>"Safety profile and adverse effect of the vaccine",
            'pregnant_reason'=>"Currently pregnant/lactating or planning to get pregnant",            
            'brand_reason'=>"Available vaccine brand options",
            'lack_of_information_reason'=>"I don’t believe it is a solution to CoViD-19",
            'others_reason'=>"Others",
        ];
        foreach ($reasons as $key => $r) {
            $reason[] = [
                "description"=>$r,
                "value"=>$surveys->where($key,1)->count()
            ];
        }

        $data = [
            'total_responses_line_chart'=>[
                'labels' => $line_chart_labels,
                'responses' => $total_responses_values,
                'total_interested' => $total_interested,
                'total_not_interested' => $total_not_interested
            ],
            'total_responses'=>$total_responses,
            'gender'=>$gender,
            'male'=>$male,
            'female'=>$female,
            'population_group'=>$population_group,
            'municipality'=>$municipality,
            'comorbidity'=>$comorbidity,
            'current_pregnancy'=>$current_pregnancy,
            'planning_pregnant'=>$planning_pregnant,
            'interested'=>$interested,
            'yes_vaccine'=>$yes_vaccine,
            'no_vaccine'=>$no_vaccine,
            'reason'=>$reason,
        ];

        return $data;

    }

    public static function vaccination ($filter)
    {

        $startFilter = Carbon::parse($filter['start'])->format("Y-m-d 00:00:00");
        $endFilter = Carbon::parse($filter['end'])->addDays(1)->format("Y-m-d 00:00:00");

        // $facility = $filter['facility'];
        // $priorityGroup = $filter['priority_group'];

        $townCityCode = null;
        $wheres = [];
        if (isset($filter['town_city'])) {
            if ($filter['town_city']!="all") {
                $townCity = $filter['town_city'];
                $tc = explode("_",$townCity);
                $townCityCode = $tc[1];
                $wheres[] = ['town_city_code',$townCityCode];
            }
        }

        $registrations_all = Registration::where($wheres)->whereBetween('created_at',[$startFilter,$endFilter])->get();
        $registrations = Registration::where($wheres)->whereHas('vaccine.dosages', function(Builder $query) use ($startFilter,$endFilter) {
            $query->whereBetween('created_at',[$startFilter,$endFilter]);
        })->get();
        // $registrations_vaccines = Registration::has('vaccine')->where($wheres)->whereBetween('created_at',[$startFilter,$endFilter])->get();
        $registrations_vaccines = Registration::has('vaccine')->where($wheres)->whereHas('vaccine.dosages', function(Builder $query) use ($startFilter,$endFilter) {
            $query->whereBetween('created_at',[$startFilter,$endFilter]);
        })->get();
        
        $vaccines = $registrations_vaccines->filter(function($registration) {
            $vaccine = $registration->vaccine()->first();
            if (is_null($vaccine)) {
                return false;
            } else {
                $dosages = $vaccine->dosages()->get();
                return count($dosages) >= 1;
            }
        });
        $first_dosage = $registrations_vaccines->map(function($registration) {
            $vaccine = $registration->vaccine()->first();
            if (is_null($vaccine)) {
                return 0;
            } else {
                $dosages = $vaccine->dosages()->get();
                return collect($dosages)->where('dose',1)->count();
            }
        });
        $second_dosage = $registrations_vaccines->map(function($registration) {
            $vaccine = $registration->vaccine()->first();
            if (is_null($vaccine)) {
                return 0;
            } else {
                $dosages = $vaccine->dosages()->get();
                return collect($dosages)->where('dose',2)->count();
            }
        });
        $third_dosage = $registrations_vaccines->map(function($registration) {
            $vaccine = $registration->vaccine()->first();
            if (is_null($vaccine)) {
                return 0;
            } else {
                $dosages = $vaccine->dosages()->get();
                return collect($dosages)->where('dose',3)->count();
            }
        });                

        $startDay = Carbon::parse($filter['start'])->format("Y-m-d");
        $endDay = Carbon::parse($filter['end'])->format("Y-m-d");
        $day = $startDay;

        $total_registered = $registrations->count();
        $total_vaccinated = $vaccines->count();

        $health_workers = $registrations->where('priority_group','01_A1')->count();
        $senior_citizen = $registrations->where('priority_group','02_A2')->count();
        $adult_with_comorbidity = $registrations->where('priority_group','03_A3')->count();
        $frontline_personnel_essential_sector = $registrations->where('priority_group','04_A4')->count();
        $poor_population = $registrations->where('priority_group','05_A5')->count();
        $teacher = $registrations->where('priority_group','06_B1')->count();
        $other_government_workers = $registrations->where('priority_group','07_B2')->count();
        $other_essential_workers = $registrations->where('priority_group','08_B3')->count();
        $socio_demographic_groups = $registrations->where('priority_group','09_B4')->count();
        $ofw = $registrations->where('priority_group','10_B5')->count();
        $other_remaining_workforce = $registrations->where('priority_group','11_B6')->count();
        $rest_of_the_population = $registrations->where('priority_group','12_C')->count();

        $brands = config('constants.brands');

        /**
         * Complete Immunization
         */
        $complete_immunization = $registrations_vaccines->filter(function($registration_vaccine) use ($brands) {
            $vaccine = $registration_vaccine->vaccine()->first();
            $dosages = $vaccine->dosages()->get();
            $vaccine_brand = (count($dosages))?collect($dosages)->first()['brand_name']:0;
            if ($vaccine_brand) {
                $vaccine = collect($brands)->where('id',$vaccine_brand)->first();
                $total = $vaccine['dosages'];
                return count($dosages) >= $total;
            } else {
                return false;
            }
        })->count();

        /**
         * No of individual eligible
         */
        $individual_eligible = $registrations_all->whereIn('priority_group',['01_A1','02_A2','04_A4'])->count();

        /**
         * Total Population
         */
        $total_population = config('constants.total_population');

        /**
         * Immunized vs Total Eligible
         */
        // $divisor = ($individual_eligible==0)?1:$individual_eligible;
        $divisor = ($individual_eligible==0)?1:$total_population;
        $immunized_vs_eligible = $complete_immunization/$divisor*100;

        /**
         * Tabulations
         */
        $facilities = Hospital::all();

        $total_doses = [];
        $wheres_hw = $wheres;
        $wheres_hw[] = ['priority_group','01_A1'];
        // $all_health_workers = Registration::has('vaccine.dosages')->where($wheres_hw)->whereBetween('created_at',[$startFilter,$endFilter])->get();
        $all_health_workers = Registration::has('vaccine.dosages')->whereHas('vaccine.dosages', function(Builder $query) use ($startFilter,$endFilter) {
            $query->whereBetween('created_at',[$startFilter,$endFilter]);
        })->get();
        $wheres_sc = $wheres;
        $wheres_sc[] = ['priority_group','02_A2'];
        // $all_senior_citizens = Registration::has('vaccine.dosages')->where($wheres_sc)->whereBetween('created_at',[$startFilter,$endFilter])->get();
        $all_senior_citizens = Registration::has('vaccine.dosages')->where($wheres_sc)->whereHas('vaccine.dosages', function(Builder $query) use ($startFilter,$endFilter) {
            $query->whereBetween('created_at',[$startFilter,$endFilter]);
        })->get();
        $wheres_awc = $wheres;
        $wheres_awc[] = ['priority_group','03_A3'];
        $wheres_awc[] = ['with_comorbidity','01_Yes'];
        // $all_adults_with_comorbidity = Registration::has('vaccine.dosages')->where($wheres_awc)->whereBetween('created_at',[$startFilter,$endFilter])->get();
        $all_adults_with_comorbidity = Registration::has('vaccine.dosages')->where($wheres_awc)->whereHas('vaccine.dosages', function(Builder $query) use ($startFilter,$endFilter) {
            $query->whereBetween('created_at',[$startFilter,$endFilter]);
        })->get();
        $wheres_f = $wheres;
        $wheres_f[] = ['priority_group','04_A4'];
        // $all_frontliners = Registration::has('vaccine.dosages')->where($wheres_f)->whereBetween('created_at',[$startFilter,$endFilter])->get();
        $all_frontliners = Registration::has('vaccine.dosages')->where($wheres_f)->whereHas('vaccine.dosages', function(Builder $query) use ($startFilter,$endFilter) {
            $query->whereBetween('created_at',[$startFilter,$endFilter]);
        })->get();

        // $all_adults_with_comorbidity = Registration::has('vaccine.dosages')->where('with_comorbidity','01_Yes')->whereBetween('created_at',[$startFilter,$endFilter])->get();

        $total_vaccines_useds = [];

        foreach ($facilities as $facility) {

            $facility_id = $facility->id;

            /**
             * Total doses
             */
            $doses_health_workers = $all_health_workers->map(function($registration) use ($facility_id) {
                if ($registration->vaccine()->first()->vaccination_facility==$facility_id) {
                    return $registration->vaccine()->first()->dosages()->count();                    
                } else {
                    return 0;
                }
            });

            $adults_with_comorbidity = $all_adults_with_comorbidity->map(function($registration) use ($facility_id) {
                if ($registration->vaccine()->first()->vaccination_facility==$facility_id) {
                    return $registration->vaccine()->first()->dosages()->count();                    
                } else {
                    return 0;
                }
            });      

            $senior_citizens = $all_senior_citizens->map(function($registration) use ($facility_id) {
                if ($registration->vaccine()->first()->vaccination_facility==$facility_id) {
                    return $registration->vaccine()->first()->dosages()->count();                    
                } else {
                    return 0;
                }
            });

            $frontliners = $all_frontliners->map(function($registration) use ($facility_id) {
                if ($registration->vaccine()->first()->vaccination_facility==$facility_id) {
                    return $registration->vaccine()->first()->dosages()->count();                    
                } else {
                    return 0;
                }
            });

            $all_doses = $doses_health_workers->sum() + $senior_citizens->sum() + $adults_with_comorbidity->sum() + $frontliners->sum();
            $total_dose = [
                'id' => $facility_id,
                'facility_name' => $facility->description,
                'health_workers' => $doses_health_workers->sum(), # A1
                'senior_citizens' => $senior_citizens->sum(), # A2
                'adults_with_comorbidity' => $adults_with_comorbidity->sum(), # A3
                'frontliners' => $frontliners->sum(), # A4
                'total' => $all_doses, # A4
            ];
            $total_doses[] = $total_dose;

            /**
             * Total vaccines used
             */
            $oxford = $vaccines->map(function($registration_vaccine) use ($facility_id) {
                $vaccine = $registration_vaccine->vaccine()->where('vaccination_facility',$facility_id)->first();
                if (is_null($vaccine)) {
                    return 0;
                } else {
                    $dosages = $vaccine->dosages()->get();
                    return collect($dosages)->where('brand_name',11)->count();
                }
            });
            $pfizer = $vaccines->map(function($registration_vaccine) use ($facility_id) {
                $vaccine = $registration_vaccine->vaccine()->where('vaccination_facility',$facility_id)->first();
                if (is_null($vaccine)) {
                    return 0;
                } else {
                    $dosages = $vaccine->dosages()->get();
                    return collect($dosages)->where('brand_name',1)->count();
                }
            });
            $sinovac = $vaccines->map(function($registration_vaccine) use ($facility_id) {
                $vaccine = $registration_vaccine->vaccine()->where('vaccination_facility',$facility_id)->first();
                if (is_null($vaccine)) {
                    return 0;
                } else {
                    $dosages = $vaccine->dosages()->get();
                    return collect($dosages)->where('brand_name',6)->count();
                }
            });
            $novavax = $vaccines->map(function($registration_vaccine) use ($facility_id) {
                $vaccine = $registration_vaccine->vaccine()->where('vaccination_facility',$facility_id)->first();
                if (is_null($vaccine)) {
                    return 0;
                } else {
                    $dosages = $vaccine->dosages()->get();
                    return collect($dosages)->where('brand_name',10)->count();
                }
            });
            $moderna = $vaccines->map(function($registration_vaccine) use ($facility_id) {
                $vaccine = $registration_vaccine->vaccine()->where('vaccination_facility',$facility_id)->first();
                if (is_null($vaccine)) {
                    return 0;
                } else {
                    $dosages = $vaccine->dosages()->get();
                    return collect($dosages)->where('brand_name',2)->count();
                }
            });
            $janssen = $vaccines->map(function($registration_vaccine) use ($facility_id) {
                $vaccine = $registration_vaccine->vaccine()->where('vaccination_facility',$facility_id)->first();
                if (is_null($vaccine)) {
                    return 0;
                } else {
                    $dosages = $vaccine->dosages()->get();
                    return collect($dosages)->where('brand_name',5)->count();
                }
            });
            $gamaleya = $vaccines->map(function($registration_vaccine) use ($facility_id) {
                $vaccine = $registration_vaccine->vaccine()->where('vaccination_facility',$facility_id)->first();
                if (is_null($vaccine)) {
                    return 0;
                } else {
                    $dosages = $vaccine->dosages()->get();
                    return collect($dosages)->where('brand_name',4)->count();
                }
            });
            $bharat = $vaccines->map(function($registration_vaccine) use ($facility_id) {
                $vaccine = $registration_vaccine->vaccine()->where('vaccination_facility',$facility_id)->first();
                if (is_null($vaccine)) {
                    return 0;
                } else {
                    $dosages = $vaccine->dosages()->get();
                    return collect($dosages)->where('brand_name',7)->count();
                }
            });        

            $all_vaccines_used = $oxford->sum() + $pfizer->sum() + $sinovac->sum() + $novavax->sum() + $moderna->sum() + $janssen->sum() + $gamaleya->sum() + $bharat->sum();
            
            $total_vaccines_used = [
                'id' => $facility_id,
                'facility_name' => $facility->description,
                'oxford' => $oxford->sum(),
                'pfizer' => $pfizer->sum(), # 1
                'sinovac' => $sinovac->sum(), # 6
                'novavax' => $novavax->sum(), # 10
                'moderna' => $moderna->sum(), # 2
                'janssen' => $janssen->sum(), # 5
                'gamaleya' => $gamaleya->sum(), # 4
                'bharat' => $bharat->sum(), # 7
                'total' => $all_vaccines_used
            ];

            $total_vaccines_useds[] = $total_vaccines_used;

        }

        $data = [
            'total_registered'=> $total_registered,
            'total_vaccinated' => $total_vaccinated,
            'dosages' => [
                'first_dosage' => number_format($first_dosage->sum()),
                'second_dosage' => number_format($second_dosage->sum()),
                'third_dosage' => number_format($third_dosage->sum())
            ],
            'priority_group' => [
                'health_workers' => $health_workers,
                'senior_citizen' => $senior_citizen,
                'adult_with_comorbidity' => $adult_with_comorbidity,
                'frontline_personnel_essential_sector' => $frontline_personnel_essential_sector,
                'poor_population' => $poor_population,
                'teacher' => $teacher,
                'other_government_workers' => $other_government_workers,
                'other_essential_workers' => $other_essential_workers,
                'socio_demographic_groups' => $socio_demographic_groups,
                'ofw' => $ofw,
                'other_remaining_workforce' => $other_remaining_workforce,
                'rest_of_the_population' => $rest_of_the_population,
            ],
            'complete_immunization' => $complete_immunization,
            'waiting' => 0,
            'individual_eligible' => $individual_eligible,
            'immunized_vs_eligible'=> round($immunized_vs_eligible,5),
            'total_doses' => $total_doses,
            'total_vaccines_used' => $total_vaccines_useds,
        ];

        return $data;

    }

    public static function registrations ($filter)
    {
        $startFilter = Carbon::parse($filter['start'])->format("Y-m-d 00:00:00");
        $endFilter = Carbon::parse($filter['end'])->addDays(1)->format("Y-m-d 00:00:00");

        $townCityCode = null;
        $wheres = [];
        if (isset($filter['town_city'])) {
            if ($filter['town_city']!="all") {
                $townCity = $filter['town_city'];
                $tc = explode("_",$townCity);
                $townCityCode = $tc[1];
                $wheres[] = ['town_city_code',$townCityCode];
            }
        }

        $registrations = Registration::whereBetween('created_at',[$startFilter,$endFilter])->get();

        $total_registration = $registrations->count();
        
        $female = $registrations->where('gender','01_Female')->count();
        $male = $registrations->where('gender','02_Male')->count();

        $municipality = [];
        $municipalities = [
            "agoo" => [ "code" => "_13301_AGOO", "description" => "AGOO" ],
            "aringay" => [ "code" => "_13302_ARINGAY", "description" => "ARINGAY" ],
            "bacnotan" => [ "code" => "_13303_BACNOTAN", "description" => "BACNOTAN" ],
            "bagulin" => [ "code" => "_13304_BAGULIN", "description" => "BAGULIN" ],
            "balaoan" => [ "code" => "_13305_BALAOAN", "description" => "BALAOAN" ],
            "bangar" => [ "code" => "_13306_BANGAR", "description" => "BANGAR" ],
            "bauang" => [ "code" => "_13307_BAUANG", "description" => "BAUANG" ],
            "burgos" => [ "code" => "_13308_BURGOS", "description" => "BURGOS" ],
            "caba" => [ "code" => "_13309_CABA", "description" => "CABA" ],
            "luna" => [ "code" => "_13310_LUNA", "description" => "LUNA" ],
            "naguilian" => [ "code" => "_13311_NAGUILIAN", "description" => "NAGUILIAN" ],
            "pugo" => [ "code" => "_13312_PUGO", "description" => "PUGO" ],
            "rosario" => [ "code" => "_13313_ROSARIO", "description" => "ROSARIO" ],
            "sfc" => [ "code" => "_13314_CITY_OF_SAN_FERNANDO", "description" => "SAN FERNANDO CITY" ],
            "san_gabriel" => [ "code" => "_13315_SAN_GABRIEL", "description" => "SAN GABRIEL" ],
            "san_juan" => [ "code" => "_13316_SAN_JUAN", "description" => "SAN JUAN" ],
            "santo_tomas" => [ "code" => "_13317_SANTO_TOMAS", "description" => "SANTO TOMAS" ],
            "santol" => [ "code" => "_13318_SANTOL", "description" => "SANTOL" ],
            "sudipen" => [ "code" => "_13319_SUDIPEN", "description" => "SUDIPEN" ],
            "tubado" => [ "code" => "_13320_TUBAO", "description" => "TUBAO" ],
        ];

        foreach ($municipalities as $m) {
            $municipality[] = [
                "town"=>$m,
                "A1"=>$registrations->where('priority_group','01_A1')->where('town_city',$m['code'])->count(),
                "A2"=>$registrations->where('priority_group','02_A2')->where('town_city',$m['code'])->count(),
                "A3"=>$registrations->where('priority_group','03_A3')->where('town_city',$m['code'])->count(),
                "A4"=>$registrations->where('priority_group','04_A4')->where('town_city',$m['code'])->count()
            ];
        };



        $data = [
            'total_registered'=> number_format($total_registration),
            'gender' => [ 
                'male' => number_format($male),
                'female' => number_format($female)
            ],
            'municipalities'=>$municipality,
        ];

        return $data;
    }

}