<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Traits\Messages;

use App\Models\Hospital;
use App\Models\User;

class GeneralDataSelections extends Controller
{

    use Messages;

    /**
     * Hospital selection
     */
    public function hospitals()
    {
        $hospitals = Hospital::select(['id','description','cbcr_id'])->orderBy('cbcr_id')->get();

        return $this->jsonSuccessResponse($hospitals, 200);
    }

    public function groups()
    {
        $groups = config('constants.groups');

        return $this->jsonSuccessResponse($groups, 200);
    }

    public function users()
    {
        $users = User::all();

        $users = $users->map(function($user) {
            $map = [
                'id' => $user['id'],
                'name' => "{$user['firstname']} {$user['lastname']}"
            ];
            return $map;
        })->values();

        return $this->jsonSuccessResponse($users, 200);
    }

    public function vaccinators()
    {
        $hospital_id = Auth::guard('api')->user()->hospital;

        $users = User::where('group_id',5)->where('hospital',$hospital_id)->get();

        $users = $users->map(function($user) {
            $map = [
                'id' => $user['id'],
                'name' => "{$user['firstname']} {$user['lastname']}"
            ];
            return $map;
        })->values();

        return $this->jsonSuccessResponse($users, 200);
    }    

}
