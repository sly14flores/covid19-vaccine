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
            'vaccination_facility' => $this->facility->description,
            'facility_others' => $this->facility_others,
            'vaccination_session' => $this->session($this->vaccination_session),
            'date' => Carbon::parse($this->created_at)->format('F j, Y h:i A')
        ];
    }
}
