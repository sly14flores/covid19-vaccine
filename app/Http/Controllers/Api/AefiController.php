<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Aefi;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AefiResource;
use App\Http\Resources\AefiResourceCollection;

use App\Traits\Messages;

class AefiController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $aefis = Aefi::where('qr_pass_id',$id)->get();

        if (is_null($aefis)) {
			return $this->jsonErrorResourceNotFound();
        }
        
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

        $aefi = Aefi::where('dosage_id',$id)->first();

        if (is_null($aefi)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new AefiResource($aefi);

        return $this->jsonSuccessResponse($data, 200);

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

        $rules = [
            'adverse_events' => 'array', # array
            'others' => 'string',
            'date' => 'date',
            'time' => 'time',
            'is_serious' => 'integer',
            'serious' => 'array',
            'other_serious' => 'string',
            'current_status' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
            // return $validator->errors();
        }

        /** Get validated data */
        $data = $validator->valid();
        $aefi = Aefi::where('dosage_id',$id)->first();
        $aefi->fill($data);
        $aefi->save();

        return $this->jsonSuccessResponse(new AefiResource($aefi), 200, 'Aefi info updated successfully');

    }

    public function structure()
    {
        $data = new Aefi;

        $aefi_data = [
            'adverse_events' => $data->AdverseEvents(), // serialize_array
            'serious' => $data->Serious(), // serialize_array
            'current_status' => $data->CurrentStatus(), // serialize_array                
        ];

        return $this->jsonSuccessResponse($aefi_data, 200);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }    
}
