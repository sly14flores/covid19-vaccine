<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Dosage;
use Carbon\Carbon;

class VaccineScreeningInfo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $dose = $request->dose;

        $name = "[{$this->qr_pass_id}], {$this->last_name}, {$this->first_name}";

        if ($this->suffix!=="NA") {
            $name .= " ".$this->suffix;
        }

        $genders = [
            "01_Female" => "Female",
            "02_Male" => "Male"
        ];

        $dosage = $this->vaccine->dosages()->get()->filter(function($d) use ($dose) {
            return $d->dose == $dose;
        });

        $dosage_id = (is_null($dosage->first()))?null:$dosage->first()->id;
        $pre_assessment = (is_null($dosage->first()))?null:$dosage->first()->pre_assessment;
        $vitals = (is_null($dosage->first()))?null:$dosage->first()->vitals()->get();

        $today = date("Y-m-d");
        $diff = date_diff(date_create($this->birthdate), date_create($today));
        $age = $diff->format('%y');
        

        return [
            'id' => $this->id,
            'qr_pass_id' => $this->qr_pass_id,
            'name' => $name,
            'age' => $age,
            'birthdate' => Carbon::parse($this->birthdate)->format("F j, Y"),
            'gender' => $genders[$this->gender],
            'contact_no' => $this->contact_no,
            'pre_assessment' => $pre_assessment,
            'vitals' => $vitals,
            'dosage_id' => $dosage_id,
            'dels' => [],
        ];
    }
}
