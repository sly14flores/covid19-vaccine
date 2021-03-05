<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;
use App\Traits\Messages;
use App\Rules\ExcelRule;

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

        if (is_null($request->file('excel'))) {
            return $this->jsonErrorDataValidation();
        }

		$rules = [
			'excel' => ['required',new ExcelRule($request->file('excel'))],
		];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        };

        $hospital = Auth::user()->hospital;

        if (is_null($hospital)) {
            return $this->jsonFailedResponse(null, 400, $message = "You have no assigned hospital, uploading is not possible");
        }

        $path = "imports/$hospital/";
        $filename = Str::random(10).".".$request->file('excel')->getClientOriginalExtension();

        $request->file('excel')->storeAs($path, $filename);

        return $this->jsonCreateSuccessResponse([
            'filename' => $filename
        ]);        

    }

    /**
     * Check if excel file has correct structures
     * Validation
     */
    public function check()
    {

    }

    /**
     * Import rows from excel file
     */
    public function import()
    {

    }

}
