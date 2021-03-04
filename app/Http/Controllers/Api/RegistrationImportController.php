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

		$rules = [
			'excel' => ['required',new ExcelRule($request->file('excel'))],
		];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        };

        $office = 1;

        $path = "imports/$office/";
        $filename = Str::random(40).".".$request->file('excel')->getClientOriginalExtension();

        $request->file('excel')->storeAs($path, $filename);

        return $this->jsonCreateSuccessResponse([
            'filename' => $filename
        ]);        

    }

    /**
     * Check if excel file has correct structures
     */
    public function check()
    {

    }

    /**
     * Import row from excel file
     */
    public function import()
    {

    }

}
