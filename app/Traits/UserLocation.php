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
        $location = (is_null($user->userHospital))?0:$user->userHospital->townCity->citymunDesc;

        return $location;        
    }

}