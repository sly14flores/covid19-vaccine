<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait UserLocation
{
    public static function userNotAdmin()
    {
        $user = Auth::user();
        return $user->notAdmin();
    }

    public static function userLocation()
    {
        $user = Auth::user();
        $location = (is_null($user->userHospital))?0:$user->userHospital->location;

        return $location;
    }

    public static function userLocationDesc()
    {
        $user = Auth::user();
        $hospital = (is_null($user->userHospital))?null:$user->userHospital;
        $location = (is_null($hospital->townCity))?0:$hospital->townCity->citymunDesc;

        return $location;        
    }

}