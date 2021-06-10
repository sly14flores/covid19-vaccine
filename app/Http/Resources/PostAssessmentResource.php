<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostAssessmentResource extends JsonResource
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
            'dose' => $this->dose,
            'assessments' => $this->assessments,
            'blood_pressure' => $this->blood_pressure,
            'oxygen_saturation' => $this->oxygen_saturation,
            'pulse_rate' => $this->pulse_rate,
        ];
    }
}
