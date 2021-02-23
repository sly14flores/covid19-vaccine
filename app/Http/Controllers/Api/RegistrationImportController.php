<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Traits\Messages;

use App\Models\QrPass;
use App\Models\Registration;

class RegistrationImportController extends Controller
{
    use Messages;

    private $http_code_ok;
    private $http_code_error;  

    public function __construct()
	{

		$this->middleware(['auth:api']);

        $this->http_code_ok = 200;
        $this->http_code_error = 500;

	}

    public function upload(Request $request)
    {

    }

}
