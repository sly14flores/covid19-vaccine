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

        $brands = config('constants.brands');

        $doses = [
            'First',
            'Second',
            'Third'
        ];

        $dosages->map(function($dosage) use ($brands, $doses) {
            $brand_name = collect($brands)->where('id',$dosage->brand_name)->first();
            $dosage->brand_name = $brand_name['name'];
            $vaccines = $brand_name['vaccines'];
            $vaccine_name = collect($vaccines)->where('id',$dosage->vaccine_name)->first();           
            $dosage->vaccine_name = $vaccine_name['name'];
            $dosage->dose = $doses[$dosage->dose-1];
            $dosage->vaccinator = $dosage->vaccinator();
            return $dosage;
        });

        return [
            'id' => $this->id,
            'vaccination_facility' => $this->vaccination_facility,
            'facility_others' => $this->facility_others,
            'vaccination_session' => $this->vaccination_session,
            'dosages' => $dosages,
        ];
    }
}
