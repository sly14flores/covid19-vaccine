<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\CityMun;
use App\Models\Province;
use App\Traits\DOHHelpers;

class QrPassResource extends JsonResource
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

        $provDesc = ($this->province==null) ? "" : $this->province->provDesc;
        $citymunDesc = ($this->cityMun==null) ? "" : $this->cityMun->citymunDesc.", ";
        $brgyDesc = ($this->barangay==null) ? "" : $this->barangay->brgyDesc.", ";

        $complete_address = "{$this->address} {$brgyDesc}{$citymunDesc}{$provDesc}";

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
            "province" => ($this->province) ? $this->toDOHProv($this->province) : null,
            "provinceDesc" => ($this->province) ? $this->province->provDesc : null,
            "cityMun" => ($this->cityMun) ? $this->toDOHMun($this->cityMun) : null,
            "cityMunDesc" => ($this->cityMun) ? $this->cityMun->citymunDesc : null,
            "barangay" => ($this->barangay) ? $this->toDOHBrgy($this->barangay) : null,
            "barangayDesc" => ($this->barangay) ? $this->barangay->brgyDesc : null,
            "contact_no" => $this->mobile_number,
            "complete_address" => $complete_address,
        ];
    }
}
