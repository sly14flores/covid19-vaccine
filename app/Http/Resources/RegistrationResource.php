<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\DOHHelpers;

class RegistrationResource extends JsonResource
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
            'barangay' => $this->barangay,
            'town_city' => $this->town_city,
            'province' => $this->province,
            'contact_no' => $this->contact_no,
            'category' => $this->category,
            'category_id' => $this->category_id,
            'category_id_no' => $this->category_id_no,
            'philhealth' => $this->philhealth,
            'pwd_id' => $this->pwd_id,
            'priority_group' => $this->priority_group,
            'sub_priority_group' => $this->sub_priority_group,
            'occupation' => $this->occupation,
            'allergic_to_vaccines' => $this->allergic_to_vaccines,
            'with_allergy' => $this->with_allergy,
            'with_comorbidity' => $this->with_comorbidity,
            'is_registered' => $this->is_registered,
            'origin' => $this->origin
        ];
    }
}
