<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $hospitals = hospital::select(['id','description'])->get();

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
        $users = User::where('group_id',5)->get();

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
