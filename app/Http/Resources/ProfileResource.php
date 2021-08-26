<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\CityMun;
use App\Models\Province;
use App\Traits\DOHHelpers;

class ProfileResource extends JsonResource
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

        $dosages = $this->dosages()->get()->makeHidden(['created_at']);

        $dosages->map(function($dosage, $i) {
            $dosage->index = $i;
            $dosage->vaccinator = $dosage->vaccinator();
            $dosage->brand_description = $dosage->brand($dosage->brand_name);
            $dosage->vaccine_description = $dosage->vaccine_description($dosage->brand_name,$dosage->brand_name);
            $dosage->vaccination_facility = $dosage->cbcr_id($dosage->vaccination_facility);
        });

        return [
            "id" => $this->id,
            "qr_pass_id" => $this->qr_pass_id,
            "last_name" => $this->last_name,
            "first_name" => $this->first_name,
            "middle_name" => $this->middle_name,
            "suffix" => $this->suffix,
            "birthdate" => $this->birthdate,
            'contact_no' => $this->contact_no,
            "philhealth" => $this->philhealth,
            'dosages' => $dosages,
            'province' => $this->province,
            'townCity' => (is_null($this->townCity))?"":$this->townCity->citymunDesc,
            'town_city' => $this->town_city,
            'barangay' => $this->barangay,
            'fully_vaccinated' => $this->fully_vaccinated,
            'priority_group' => $this->priority($this->priority_group),
        ];
    }
}
