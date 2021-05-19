<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\Messages;
use App\Traits\Summary;

class RegistrationsSummary extends Controller
{
    
    use Messages;    

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getSummary(Request $request)
    {

        $filter = [
            "town_city" => $request->town_city, 
            "facility" => $request->facility,
            "priority_group" => $request->priority_group,
            "start" => $request->start_date,
            "end" => $request->end_date
        ];

        $data = Summary::registrations($filter);

        return $this->jsonSuccessResponse($data, 200);         

    }    
}
