<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationsListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $doses = ["First Dose", "Second Dose"];

        $dosages_count = (is_null($this->dosages_count))?0:$this->dosages_count;
        $screening_for_dose = $doses[$dosages_count] ?? null;

        return [
            'id' => $this->id,
            'qr_pass_id' => $this->qr_pass_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'town_city' => $this->town_city,
            'barangay' => $this->barangay,
            'address' => $this->address,
            'townCity' => (is_null($this->townCity))?"":$this->townCity->citymunDesc,
            'text' => $this->text,
            'vaccine_count' => $this->vaccine_count,
            'dosages_count' => $this->dosages_count,
            'screening_for_dose' => $screening_for_dose,
        ];
    }
}
