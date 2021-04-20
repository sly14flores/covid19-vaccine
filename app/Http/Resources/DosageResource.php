<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DosageResource extends JsonResource
{
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
            'user_id' => $this->user_id,
            'brand_name' => $this->brand_name,
            'vaccine_name' => $this->vaccine_name,
            'site_of_injection' => $this->site_of_injection,
            'expiry_date' => $this->expiry_date,            
            'batch_number' => $this->batch_number,
            'lot_number' => $this->lot_number,
            'dose' => $this->dose,
            'diluent' => $this->diluent,
            'date_of_reconstitution' => $this->date_of_reconstitution,
            'time_of_reconstitution' => $this->time_of_reconstitution,
            'diluent_batch_number' => $this->diluent_batch_number,
            'diluent_lot_number' => $this->diluent_lot_number,
            'pre_assessment' => $this->pre_assessment,
            'post_assessment' => $this->post_assessment,
            'aefi' => $this->aefi,
        ];
    }
}
