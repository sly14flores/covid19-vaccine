<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Traits\DOHHelpers;

class LoginResource extends JsonResource
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
        $town_city = null;
        $town_city_doh = null;

        if (!is_null($this->userHospital) && !is_null($this->userHospital->townCity)) {
            $town_city = $this->userHospital->townCity->citymunDesc;
            $town_city_doh = $this->toDOHMun($this->userHospital->townCity);
        }

        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'token' => $this->token,
            'hospital' => $this->hospital,
            'group_id' => $this->group_id,
            'group_name' => $this->groupName($this->group_id),
            'town_city' => $town_city,
            'town_city_doh' => $town_city_doh,
            'is_admin' => $this->isAdmin(),
        ];
    }
}
