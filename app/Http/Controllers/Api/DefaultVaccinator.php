<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Traits\Messages;

class DefaultVaccinator extends Controller
{

    use Messages;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $id = Auth::guard('api')->user()->id;

        $data = ['id' => $id];

        return $this->jsonSuccessResponse($data, 200);
    }
}
