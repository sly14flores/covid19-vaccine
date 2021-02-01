<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'qr_pass_id' => $this->qr_pass_id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'province' => $this->province,
            'town_city' => $this->town_city,
            'barangay' => $this->barangay,
            'frontline_health_workers' => $this->frontline_health_workers,
            'senior_citizens' => $this->senior_citizens,
            'uniformed_personnel' => $this->uniformed_personnel,
            'teachers' => $this->teachers,
            'social_workers' => $this->social_workers,
            'government_employees' => $this->government_employees,
            'agriculture_group' => $this->agriculture_group,
            'food_industry' => $this->food_industry,
            'tranportation' => $this->tranportation,
            'tourism' => $this->tourism,
            'persons_deprived_of_liberty' => $this->persons_deprived_of_liberty,
            'persons_with_disability' => $this->persons_with_disability,
            'ofw' => $this->ofw,
            'others_population_group' => $this->others_population_group,
            'lung_disease' => $this->lung_disease,
            'kidney_disease' => $this->kidney_disease,
            'diabetes' => $this->diabetes,
            'high_blood_pressure' => $this->high_blood_pressure,
            'cancer' => $this->cancer,
            'leukemia' => $this->leukemia,
            'hiv' => $this->hiv,
            'mental_problem' => $this->mental_problem,
            'others_health_condition' => $this->others_health_condition,
            'none_of_the_above' => $this->none_of_the_above,
            'yes_currently_pregnant' => $this->yes_currently_pregnant,
            'no_currently_pregnant' => $this->no_currently_pregnant,
            'yes_pregnant_baby' => $this->yes_pregnant_baby,
            'no_pregnant_baby' => $this->no_pregnant_baby,
            'not_sure_pregnant_baby' => $this->not_sure_pregnant_baby,
            'yes_vaccine' => $this->yes_vaccine,
            'no_vaccine' => $this->no_vaccine,
            'yes_contribute' => $this->yes_contribute,
            'no_contribute' => $this->no_contribute,
            'efficacy_rate_reason' => $this->efficacy_rate_reason,
            'safety_reason' => $this->safety_reason,
            'presence_reason' => $this->presence_reason,
            'brand_reason' => $this->brand_reason,
            'pregnant_reason' => $this->pregnant_reason,
            'lack_of_information_reason' => $this->lack_of_information_reason,
            'others_reason' => $this->others_reason,
            'one_hundred_percent_fee' => $this->one_hundred_percent_fee,
            'seventy_five_percent_fee' => $this->seventy_five_percent_fee,
            'fifty_percent_fee' => $this->fifty_percent_fee,
            'twenty_five_percent_fee' => $this->twenty_five_percent_fee,
        ];
    }
}
