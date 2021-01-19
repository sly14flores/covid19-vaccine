<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\CityMun;
use App\Models\Province;

class QrPassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $cityMun = CityMun::where('psgcCode', $this->addressmunicity*1000)->first();
        $province = Province::where('psgcCode', $this->addressprovince*100000)->first();

        return [
            "id" => $this->id,
            // "name" => $this->name,
            "lastname" => $this->lastname,
            "firstname" => $this->firstname,
            "middlename" => $this->middlename,
            "gender" => $this->gender,
            "dob" => $this->dob,
            "age" => $this->age,
            // "addressbrgy" => $this->addressbrgy,
            // "addressmunicity" => $this->addressmunicity,
            // "addressprovince" => $this->addressprovince,
            "province" => $province->provDesc,    
            "cityMun" => $cityMun->citymunDesc,
            "barangay" => $this->barangay->brgyDesc,
        ];
    }
}
