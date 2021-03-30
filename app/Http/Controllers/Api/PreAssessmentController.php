<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PreAssessment;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PreAssessmentResource;
use App\Http\Resources\PreAssessmentResourceCollection;

use App\Traits\Messages;

class PreAssessmentController extends Controller
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
        $pre_assessments = PreAssessment::where('qr_pass_id',$id)->get();

        if (is_null($pre_assessments)) {
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

        $pre = PreAssessment::where('qr_pass_id',$id)->first();

        if (is_null($pre)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new PreAssessmentResource($pre);

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
            'consent' => 'integer',
            'assessments' => 'array', # array
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
            // return $validator->errors();
        }

        /** Get validated data */
        $data = $validator->valid();
        $assessment = PreAssessment::where('qr_pass_id',$id)->first();
        $assessment->fill($data);
        $assessment->save();

        return $this->jsonSuccessResponse(new PreAssessmentResource($assessment), 200, 'Pre assessment info updated successfully');

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
