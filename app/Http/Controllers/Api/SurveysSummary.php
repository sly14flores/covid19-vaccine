<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\Messages;
use App\Traits\Summary;

class SurveysSummary extends Controller
{

    use Messages;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getSummary(Request $request)
    {

        $filter = [
            "start" => $request->start_date,
            "end" => $request->end_date,
        ];

        $data = Summary::surveys($filter);

        return $this->jsonSuccessResponse($data, 200);         

    }
    
}
