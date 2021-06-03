<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Dosage;
use App\Models\PreAssessment;
use App\Models\PostAssessment;
use App\Models\Aefi;

use App\Http\Resources\DosageResource;
use App\Http\Resources\DosageResourceCollection;
use App\Http\Resources\DosagesListResourceCollection;

use App\Traits\Messages;
use App\Traits\DOHHelpers;
use App\Traits\SelectionsRegistration;

class DosageController extends Controller
{

    use Messages, DOHHelpers, SelectionsRegistration;

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
        $dosages = Dosage::where('vaccine_id',$id)->get();

        if (is_null($dosages)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new DosagesListResourceCollection($dosages);

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
            'vaccine_id' => 'integer',
            'qr_pass_id' => 'string',
            'user_id' => 'integer',
            'brand_name' => 'integer',
            'vaccine_name' => 'integer',
            'site_of_injection' => 'string',
            'expiry_date' => 'date',
            'batch_number' => 'integer',
            'lot_number' => 'integer',
            'dose' => 'integer',
            'diluent_batch_number' => 'integer',
            'diluent_lot_number' => 'integer',   
            'date_of_vaccination' => 'date',     
            'next_vaccination' => 'date'     
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }  

        /** Get validated data */
        $data = $validator->valid();

        try {

            DB::beginTransaction();

            /**
             * Check dose
             */
            $check_dose = Dosage::where([['dose',$data['dose']],['qr_pass_id',$data['qr_pass_id']]])->first();
            if (!is_null($check_dose)) {
                $data = new DosageResource($check_dose);
                return $this->jsonSuccessResponse($data, 200);
            }

            $dosage = new Dosage;
            $dosage->fill($data);
            $dosage->save();
            
            /**
             * Create Pre Assessment
             */
            $check_pre_assessment = PreAssessment::where([['dose',$data['dose']],['qr_pass_id',$data['qr_pass_id']]])->get();
            if (count($check_pre_assessment)==0) {
                $pre_assessment = [
                    'qr_pass_id' => $data['qr_pass_id'],
                    'consent' => false,
                    'reason' => '',
                    'dose' => $data['dose'],             
                    'assessments' => config('constants.pre_assessments')
                ];
                $pre = new PreAssessment;
                $pre->fill($pre_assessment);
                $dosage->pre_assessment()->save($pre);
            }

            /**
             * Create Post Assessment
             */
            $check_post_assessment = PostAssessment::where([['dose',$data['dose']],['qr_pass_id',$data['qr_pass_id']]])->get();
            if (count($check_post_assessment)==0) {
                $post_assessment = [
                    'qr_pass_id' => $data['qr_pass_id'],
                    'dose' => $data['dose'],
                    'assessments' => config('constants.post_assessments')
                ];
                $post = new PostAssessment;
                $post->fill($post_assessment); 
                $dosage->post_assessment()->save($post);
            }

            /**
             * Create AEFI
             */
            $check_aefi = Aefi::where([['dose',$data['dose']],['qr_pass_id',$data['qr_pass_id']]])->get();
            if (count($check_aefi)==0) {
                $aefi = new Aefi;
                $aefi_data = [
                    'qr_pass_id' => $data['qr_pass_id'],
                    'dose' => $data['dose'],
                    'adverse_events' => $aefi->AdverseEvents(), // serialize_array
                    'serious' => $aefi->Serious(), // serialize_array
                    'current_status' => $aefi->CurrentStatus(), // serialize_array                
                ];
                $aefi->fill($aefi_data);
                $dosage->aefi()->save($aefi);
            }

            DB::commit();

            $data = new DosageResource($dosage);

            return $this->jsonSuccessResponse($data, 200);      

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->jsonFailedResponse([$e->getMessage()], $this->http_code_error, 'Something went wrong.');

        }

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

        $dosage = Dosage::with(['pre_assessment','post_assessment','aefi'])->where('id',$id)->first();

        if (is_null($dosage)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new DosageResource($dosage);

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

        $dosage = Dosage::find($id);      

        if (is_null($dosage)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'vaccine_id' => 'integer',            
            'user_id' => 'integer',
            'brand_name' => 'integer',
            'vaccine_name' => 'string',
            'site_of_injection' => 'string',
            'expiry_date' => 'date',
            'batch_number' => 'integer',
            'lot_number' => 'integer',
            'dose' => 'integer',
            'date_of_vaccination' => 'date',     
            'next_vaccination' => 'date' 
        ];

        $validator = Validator::make($request->all(), $rules);        

        /** Get validated data */
        $data = $validator->valid();
        $dosage->fill($data);
        $dosage->save();

        /**
         * Update Pre Assessment
         */
        $pre_assessment = $data['pre_assessment'];
        $pre = PreAssessment::find($pre_assessment['id']);
        $pre->fill($pre_assessment);
        $dosage->pre_assessment()->save($pre);

        /**
         * Post Assessment
         */
        $post_assessment = $data['post_assessment'];
        $post = PostAssessment::find($post_assessment['id']);
        $post->fill($post_assessment);
        $dosage->post_assessment()->save($post);

        /**
         * AEFI
         */
        $aefi_data = $data['aefi'];
        $aefi = Aefi::find($aefi_data['id']);
        $aefi->fill($aefi_data);
        $dosage->aefi()->save($aefi);

        $data = new DosageResource($dosage);

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
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }

        $dosage = Dosage::find($id);        

        if (is_null($dosage)) {
			return $this->jsonErrorResourceNotFound();
        }        

        $dosage->delete();

        return $this->jsonDeleteSuccessResponse();
    }
}
