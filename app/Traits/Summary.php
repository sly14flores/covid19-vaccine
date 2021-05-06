<?php

namespace App\Traits;

use App\Models\Survey;
use App\Models\Registration;
use App\Models\Vaccine;
use App\Models\Dosage;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Builder;

trait Summary
{

    public static function surveys($filter)
    {

        $startFilter = Carbon::parse($filter['start'])->format("Y-m-d 00:00:00");
        $endFilter = Carbon::parse($filter['end'])->addDays(1)->format("Y-m-d 00:00:00");

        $startFilterChart = Carbon::parse($filter['start_chart'])->format("Y-m-d 00:00:00");
        $endFilterChart = Carbon::parse($filter['end_chart'])->addDays(1)->format("Y-m-d 00:00:00");

        $surveysChart = Survey::whereBetween('created_at',[$startFilterChart,$endFilterChart])->get();
        $surveys = Survey::whereBetween('created_at',[$startFilter,$endFilter])->get();

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

    public static function registrations($filter)
    {

        $startFilter = Carbon::parse($filter['start'])->format("Y-m-d 00:00:00");
        $endFilter = Carbon::parse($filter['end'])->addDays(1)->format("Y-m-d 00:00:00");

        $townCity = $filter['town_city'];
        $facility = $filter['facility'];
        $priorityGroup = $filter['priority_group'];

        $registrations = Registration::whereBetween('created_at',[$startFilter,$endFilter])->get();
        $vaccines = Vaccine::whereBetween('created_at',[$startFilter,$endFilter])->get();
        $dosages = Dosage::whereBetween('created_at',[$startFilter,$endFilter])->get();

        $startDay = Carbon::parse($filter['start'])->format("Y-m-d");
        $endDay = Carbon::parse($filter['end'])->format("Y-m-d");
        $day = $startDay;

        $first_dosage = $dosages->where('dose','1')->count();
        $second_dosage = $dosages->where('dose','2')->count();
        $third_dosage = $dosages->where('dose','3')->count();

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
        $registrations_vaccines = Registration::has('vaccine')->whereBetween('created_at',[$startFilter,$endFilter])->get();
        $complete_immunization = $registrations_vaccines->filter(function($registration_vaccine) use ($brands) {
            $vaccine = $registration_vaccine->vaccine()->first();
            $dosages = $vaccine->dosages()->get();
            $vaccine_brand = (count($dosages))?collect($dosages)->first()['brand_name']:0;
            if ($vaccine_brand) {
                $vaccine = collect($brands)->where('id',$vaccine_brand)->first();
                $total = $vaccine['dosages'];
                return $total >= count($dosages);
            } else {
                return false;
            }
        })->count();

        /**
         * No of individual eligible
         */
        $individual_eligible = $registrations->whereIn('priority_group',['01_A1','02_A2','04_A4'])->count();

        /**
         * Total Population
         */
        $total_population = config('constants.total_population');

        /**
         * Immunized vs Total Eligible
         */
        $immunized_vs_eligible = $complete_immunization/$individual_eligible*100;

        $data = [
            'total_registered'=> number_format($total_registered),
            'total_vaccinated' => number_format($total_vaccinated),
            'dosages' => [
                'first_dosage' => number_format($first_dosage),
                'second_dosage' => number_format($second_dosage),
                'third_dosage' => number_format($third_dosage)
            ],
            'priority_group' => [
                'health_workers' => number_format($health_workers),
                'senior_citizen' => number_format($senior_citizen),
                'adult_with_comorbidity' => number_format($adult_with_comorbidity),
                'frontline_personnel_essential_sector' => number_format($frontline_personnel_essential_sector),
                'poor_population' => number_format($poor_population),
                'teacher' => number_format($teacher),
                'other_government_workers' => number_format($other_government_workers),
                'other_essential_workers' => number_format($other_essential_workers),
                'socio_demographic_groups' => number_format($socio_demographic_groups),
                'ofw' => number_format($ofw),
                'other_remaining_workforce' => number_format($other_remaining_workforce),
                'rest_of_the_population' => number_format($rest_of_the_population),
            ],
            'complete_immunization' => number_format($complete_immunization),
            'waiting' => 0,
            'individual_eligible' => number_format($individual_eligible),
            'immunized_vs_eligible'=> number_format($immunized_vs_eligible),
        ];

        return $data;

    }

}