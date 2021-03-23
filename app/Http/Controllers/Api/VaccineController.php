<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Vaccine;
use App\Http\Resources\VaccineResource;
use App\Http\Resources\VaccineResourceCollection;
use App\Http\Resources\VaccinesListResourceCollection;

use App\Models\Registration;
use App\Http\Resources\RegistrationVaccineResource;

use App\Traits\Messages;

class VaccineController extends Controller
{
    use Messages;

    private $http_code_ok;
    private $http_code_error;    

	public function __construct()
	{
		$this->middleware(['auth:api']);
		// $this->authorizeResource(Vaccine::class, Vaccine::class);
		
        $this->http_code_ok = 200;
        $this->http_code_error = 500;

	}    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $vaccines = Vaccine::where('qr_pass_id',$id)->get();

        if (is_null($vaccines)) {
			return $this->jsonErrorResourceNotFound();
        }   

        $data = new VaccinesListResourceCollection($vaccines);

        return $this->jsonSuccessResponse($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'qr_pass_id' => 'string',
            'vaccine_name' => 'integer',
            'batch_number' => 'integer',
            'lot_number' => 'integer',
            'lot_number' => 'integer',
            'dose' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        /** Get validated data */
        $data = $validator->valid();
        $id = Auth::guard('api')->id();
        $data['user_id'] = $id;

        $vaccine = new Vaccine;
        $vaccine->fill($data);

        $vaccine->save();

        $data = new VaccineResource($vaccine);

        return $this->jsonSuccessResponse($data, 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }

        $vaccine = Vaccine::find($id);        

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new VaccineResource($vaccine);

        return $this->jsonSuccessResponse($data, 200, 'Vaccine added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }

        $vaccine = Vaccine::find($id);      

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'qr_pass_id' => 'string',
            'vaccine_name' => 'integer',
            'batch_number' => 'integer',
            'lot_number' => 'integer',
            'dose' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules);        

        /** Get validated data */
        $data = $validator->valid();        
        $id = Auth::guard('api')->id();
        $data['user_id'] = $id;

        $vaccine->fill($data);

        $vaccine->save();

        $data = new VaccineResource($vaccine);

        return $this->jsonSuccessResponse($data, 200, 'Vaccine info updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }

        $vaccine = Vaccine::find($id);        

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }        

        $vaccine->delete();

        return $this->jsonDeleteSuccessResponse();
    }

    public function qrRegistration(Request $request, $id)
    {
        $registration = Registration::where('qr_pass_id',$id)->first();

        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }        

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new RegistrationVaccineResource($registration);

        return $this->jsonSuccessResponse($data, 200);
    }
}
