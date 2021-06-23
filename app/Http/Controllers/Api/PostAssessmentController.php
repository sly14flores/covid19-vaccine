<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PostAssessment;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostAssessmentResource;
use App\Http\Resources\PostAssessmentResourceCollection;

use App\Traits\Messages;

class PostAssessmentController extends Controller
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
        $post_assessments = PostAssessment::where('qr_pass_id',$id)->get();

        if (is_null($post_assessments)) {
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

        $post = PostAssessment::where('dosage_id',$id)->first();

        if (is_null($post)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new PostAssessmentResource($post);

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
            
            'assessments' => 'array', # array
            'blood_pressure' => 'string',
            'oxygen_saturation' => 'string',
            'pulse_rate' => 'string',
            
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
            // return $validator->errors();
        }

        /** Get validated data */
        $data = $validator->valid();
        $assessment = PostAssessment::where('dosage_id',$id)->first();
        $assessment->fill($data);
        $assessment->save();

        return $this->jsonSuccessResponse(new PostAssessmentResource($assessment), 200, 'Post assessment info updated successfully');

    }

    public function structure()
    {
        $data = config('constants.post_assessments');

        return $this->jsonSuccessResponse($data, 200);
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
