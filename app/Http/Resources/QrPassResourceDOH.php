<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// use App\Models\CityMun;
// use App\Models\Province;
use App\Traits\DOHHelpers;

class QrPassResourceDOH extends JsonResource
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
        return [
            "id" => $this->id,
            // "name" => $this->name,
            "lastname" => $this->lastname,
            "firstname" => $this->firstname,
            "middlename" => $this->middlename,
            "gender" => $this->toDOHGender($this->gender),
            "dob" => $this->dob,
            "age" => $this->age,
            "address" => $this->address,
            // "addressbrgy" => $this->addressbrgy,
            // "addressmunicity" => $this->addressmunicity,
            // "addressprovince" => $this->addressprovince,
            // "address" => $this->address,
            "province" => $this->toDOHProv($this->province),
            "provinceDesc" => $this->province->provDesc,
            "cityMun" => $this->toDOHMun($this->cityMun),
            "cityMunDesc" => $this->cityMun->citymunDesc,
            "barangay" => $this->toDOHBrgy($this->barangay),
            "barangayDesc" => $this->barangay->brgyDesc,
            "contact_no" => $this->mobile_number,
            "complete_address" => "{$this->address} {$this->barangay->brgyDesc}, {$this->cityMun->citymunDesc}, {$this->province->provDesc}",
        ];
    }
}
