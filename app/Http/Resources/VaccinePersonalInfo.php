<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;

class VaccinePersonalInfo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $name = "[{$this->qr_pass_id}], {$this->last_name}, {$this->first_name}";

        if ($this->suffix!=="NA") {
            $name .= " ".$this->suffix;
        }

        $genders = [
            "01_Female" => "Female",
            "02_Male" => "Male"
        ];

        return [
            'id' => $this->id,
            'qr_pass_id' => $this->qr_pass_id,
            'name' => $name,
            'age' => Carbon::createFromFormat("ymd", Carbon::parse($this->birthdate)->format("ymd"))->age,
            'birthdate' => Carbon::parse($this->birthdate)->format("F j, Y"),
            'gender' => $genders[$this->gender],
            'contact_no' => $this->contact_no,
        ];
    }
}
