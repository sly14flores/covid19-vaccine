<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Traits\DOHHelpers;
use Carbon\Carbon;

class VaccineMonitoringInfo extends JsonResource
{

    use DOHHelpers;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $dose = $request->dose;

        $name = "[{$this->qr_pass_id}] {$this->last_name}, {$this->first_name}";

        if ($this->suffix!=="NA") {
            $name .= " ".$this->suffix;
        }

        $genders = [
            "01_Female" => "Female",
            "02_Male" => "Male"
        ];

        $dosage = $this->vaccine->dosages()->where('dose',$dose)->first();
        $post_assessment = (is_null($dosage))?null:$dosage->post_assessment;
        $aefi = (is_null($dosage))?null:$dosage->aefi;;
        if (!is_null($dosage)) {
            $dosage->name_of_vaccine = $this->getVaccineShortName($dosage->brand_name) ?? null;
            $dosage->name_of_vaccinator = $dosage->vaccinator();
            $dosage->vaccination_date = Carbon::parse($dosage->date_of_vaccination)->format("F j, Y");
            $dosage->vaccination_next = Carbon::parse($dosage->next_vaccination)->format("F j, Y");
            $dosage->reconstitution_date = Carbon::parse($dosage->date_of_reconstitution)->format("F j, Y");
        }

        $dosage_id = (is_null($dosage))?null:$dosage->id;
        $vitals = (is_null($dosage))?null:$dosage->monitoringVitals()->get();        

        return [
            'id' => $this->id,
            'qr_pass_id' => $this->qr_pass_id,
            'name' => $name,
            'age' => Carbon::createFromFormat("ymd", Carbon::parse($this->birthdate)->format("ymd"))->age,
            'birthdate' => Carbon::parse($this->birthdate)->format("F j, Y"),
            'gender' => $genders[$this->gender],
            'contact_no' => $this->contact_no,
            'region' => $this->region,
            'province' => $this->dohToProvDesc($this->province),
            'town_city' => $this->dohToMunDesc($this->town_city),
            'barangay' => $this->dohToBrgyDesc($this->barangay),
            'occupation' => $this->occupation,
            'philhealth' => $this->philhealth,
            'dosage' => $dosage,
            'post_assessment' => $post_assessment,
            'vitals' => $vitals,
            'aefi' => $aefi,
            'dels' => [],
        ];
    }
}
