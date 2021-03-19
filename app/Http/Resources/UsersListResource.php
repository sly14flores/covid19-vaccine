<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersListResource extends JsonResource
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
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'username' => $this->username,
            'hospital' => (is_null($this->userHospital))?null:$this->userHospital->description,
            'group_name' => $this->groupName($this->group_id),
            'profession' => $this->profession,
            'date_created' => $this->created_at,
        ];
    }
}
