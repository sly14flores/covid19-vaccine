<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VaccineResource extends JsonResource
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
            'vaccine_name' => $this->vaccine_name,
            'batch_number' => $this->batch_number,
            'lot_number' => $this->lot_number,
            'dose' => $this->dose,
        ];
    }
}
