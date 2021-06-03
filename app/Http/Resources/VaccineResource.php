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
        $dosages = $this->dosages()->with(['pre_assessment','post_assessment','aefi'])->get()->makeHidden(['created_at']);

        $dosages->map(function($dosage, $i) {
            $dosage->index = $i;
            $dosage->vaccinator = $dosage->vaccinator();
            $dosage->brand_description = $dosage->brand($dosage->brand_name);
            $dosage->vaccine_description = $dosage->vaccine_description($dosage->brand_name,$dosage->vaccine_name);
        });

        return [
            'id' => $this->id,
            'vaccination_facility' => $this->vaccination_facility,
            'facility_others' => $this->facility_others,
            'vaccination_session' => $this->vaccination_session,
            'dosages' => $dosages,
            'delete' => [],
        ];
    }
}
