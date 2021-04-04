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
        $dosages = $this->dosages()->with(['pre_assessment','post_assessment'])->get()->makeHidden(['created_at']);

        return [
            'id' => $this->id,
            'vaccination_facility' => $this->vaccination_facility,
            'facility_others' => $this->facility_others,
            'vaccination_session' => $this->vaccination_session,
            'dosages' => $dosages,
        ];
    }
}
