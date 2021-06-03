<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AefiResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dose' => $this->dose,
            'adverse_events' => $this->adverse_events,
            'others' => $this->others,
            'date' => $this->date,
            'time' => $this->time,
            'is_serious' => $this->is_serious,
            'serious' => $this->serious,
            'other_serious' => $this->other_serious,
            'current_status' => $this->current_status,
        ];
    }
}
