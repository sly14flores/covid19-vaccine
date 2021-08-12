<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;

class DosageReportsResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'brand_name' => $this->brand($this->brand_name),
            'vaccinator' => $this->vaccinator(),
            'batch_number' => $this->batch_number,
            'lot_number' => $this->lot_number,
            'date' => Carbon::parse($this->created_at)->format('F j, Y h:i A'),
            'qr_pass_id' => $this->qr_pass_id
        ];
    }
}
