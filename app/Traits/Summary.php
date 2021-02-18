<?php

namespace App\Traits;

use App\Models\Survey;

trait Summary
{

    public static function surveys($filter)
    {

        $surveys = Survey::all();
        $collect = collect($surveys);

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
                "value"=>$surveys->where($key,1)->count()
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

}