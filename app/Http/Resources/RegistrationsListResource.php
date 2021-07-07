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

        $color_status = $colors[$dosages_count] ?? null;        

        $screening_for_dose = $doses[$dosages_count] ?? null;
        $next_dose = $next_doses[$dosages_count];

        $inoculation_for_dose = $doses[$dosages_count] ?? null;
        $inoculation_dose = $next_doses[$dosages_count];

        $monitoring_doses = ["","First Dose", "Second Dose"];
        $monitoring_colors = ["","warning", "success"];      
        $total_dosages = 0;
        if ($this->first_dose) {
            $total_dosages++;
        }
        if ($this->second_dose) {
            $total_dosages++;
        }
        $monitoring_for_dose = $monitoring_doses[$total_dosages] ?? "";
        $monitoring_dose = $total_dosages ?? 0;
        $monitoring_status = $monitoring_colors[$monitoring_dose];

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
            'inoculation_for_dose' => $inoculation_for_dose,
            'inoculation_dose' => $inoculation_dose,
            'monitoring_for_dose' => $monitoring_for_dose,
            'monitoring_dose' => $monitoring_dose,
            'status' => $color_status,
            'monitoring_status' => $monitoring_status,
        ];
    }
}
