<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationsCertificateListResource extends JsonResource
{
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
        });

        $total_dosages = count($dosages);

        $label = 'Fully Vaccinated';
        $color = 'success';

        if ($total_dosages == 1) {
            $label = 'Not Fully Vaccinated';
            $color = 'warning';
        } else if ($total_dosages == 0) {
            $label = 'Not vaccinated yet';
            $color = 'danger';
        }

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
            'total' => $total_dosages,
            'label' => $label,
            'color' => $color
        ];
    }
}
