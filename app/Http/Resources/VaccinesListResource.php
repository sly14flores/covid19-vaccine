<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;

class VaccinesListResource extends JsonResource
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
            'brand_name' => $this->brand($this->brand_name),
            'vaccine_name' => $this->vaccine_name,
            'site_of_injection' => $this->site_of_injection,
            'expiry_date' => $this->expiry_date,
            'vaccinator' => $this->vaccinator(),
            'prc_number' => $this->prc(),
            'position' => $this->proffession(),
            'role' => $this->role(),
            'batch_number' => $this->batch_number,
            'lot_number' => $this->lot_number,
            'dose' => $this->dose,
            'date' => Carbon::parse($this->created_at)->format('F j, Y h:i A')
        ];
    }
}
