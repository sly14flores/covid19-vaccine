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
        $colors = ["warning", "success"];
        $next_doses = [1,2];

        $dosages_count = 0;
        if ($this->first_dose) {
            $dosages_count++;
        }
        $screening_for_dose = $doses[$dosages_count] ?? null;
        $color_status = $colors[$dosages_count] ?? null;
        $next_dose = $next_doses[$dosages_count];

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
            'screening_for_dose' => $screening_for_dose,
            'next_dose' => $next_dose,
            "status" => $color_status
        ];
    }
}
