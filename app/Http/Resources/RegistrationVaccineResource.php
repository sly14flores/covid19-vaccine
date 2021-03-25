<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\DOHHelpers;

class RegistrationVaccineResource extends JsonResource
{
    use DOHHelpers;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'qr_pass_id' => $this->qr_pass_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'suffix' => $this->suffix,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'region' => $this->region,
            'address' => $this->address,
            'barangay' => $this->dohToBrgy($this->barangay),
            'town_city' => $this->dohToMun($this->town_city),
            'province' => $this->dohToProv($this->province),
            'contact_no' => $this->contact_no,
            'civil_status' => $this->civil_status,
            'category' => $this->category,
            'category_id' => $this->category_id,
            'category_id_no' => $this->category_id_no,
            'employment_status' => $this->employment_status,
            'profession' => $this->profession,
            'philhealth' => $this->philhealth,
            'pwd_id' => $this->pwd_id,
            'employer_name' => $this->employer_name,
            'employer_address' => $this->employer_address,
            'employer_lgu' => $this->employer_lgu,
            'employer_municipality' => $this->employer_municipality,
            'employer_contact_no' => $this->employer_contact_no,
            'direct_interaction' => $this->direct_interaction,
            'pregnancy_status' => $this->pregnancy_status,
            'drug_allergy' => $this->drug_allergy,
            'food_allergy' => $this->food_allergy,
            'insect_allergy' => $this->insect_allergy,
            'latex_allergy' => $this->latex_allergy,
            'mold_allergy' => $this->mold_allergy,
            'pet_allergy' => $this->pet_allergy,
            'pollen_allergy' => $this->pollen_allergy,
            'with_allergy' => $this->with_allergy,
            'allergy' => $this->allergy,
            'with_allergy_others' => $this->with_allergy_others,
            'hypertension' => $this->hypertension,
            'heart_disease' => $this->heart_disease,
            'kidney_disease' => $this->kidney_disease,
            'diabetes_mellitus' => $this->diabetes_mellitus,
            'bronchial_asthma' => $this->bronchial_asthma,
            'immuno_deficiency_status' => $this->immuno_deficiency_status,
            'cancer' => $this->cancer,
            'comorbidity_others' => $this->comorbidity_others,
            'with_comorbidity' => $this->with_comorbidity,
            'comorbidity' => $this->comorbidity,
            'with_comorbidity_others' => $this->with_comorbidity_others,
            'diagnosed' => $this->diagnosed,
            'covid_classification' => $this->covid_classification,
            'diagnosed_date' => $this->diagnosed_date,
            'consent_vaccination' => $this->consent_vaccination,
        ];
    }
}
