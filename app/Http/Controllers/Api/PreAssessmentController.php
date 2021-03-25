<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PreAssessment;
use Illuminate\Support\Facades\Validator;

use App\Traits\Messages;

class PreAssessmentController extends Controller
{
    use Messages;

    private $http_code_ok;
    private $http_code_error;
    private $assessments;

	public function __construct()
	{
		$this->middleware(['auth:api']);
		
        $this->http_code_ok = 200;
        $this->http_code_error = 500;

        $this->assessments = [
            ["key"=>1,"description"=>"Age more than 16 years old?","value"=>false],
            ["key"=>2,"description"=>"Has no allergies to PEG or polysorbate?","value"=>false],
            ["key"=>3,"description"=>"Has no severe allergic reaction after the 1st dose of the vaccine?","value"=>false],
            ["key"=>4,"description"=>"Has no allergy to food, egg, medicines, and no asthma?","value"=>false],
            ["key"=>5,"description"=>"Has no history of bleeding disorders or currently taking anti-coagulants?","value"=>false],
            ["key"=>6,"description"=>"If with bleeding history, is a gauge 23 - 25 syringe available for injection?","value"=>false],
            ["key"=>7,"description"=>"Has no history of exposure to a confirmed or suspected COVID-19 case in the past 2 weeks?","value"=>false],
            ["key"=>8,"description"=>"Has not been previously treated for COVID-19 in the past 90 days?","value"=>false],
            ["key"=>9,"description"=>"Has not received any vaccine in the past 2 weeks?","value"=>false],
            ["key"=>10,"description"=>"Has not received convalescent plasma or monoclonal antibodies for COVID-19 in the past 90 days?","value"=>false],
            ["key"=>11,"description"=>"Not Pregnant?","value"=>false],
            ["key"=>12,"description"=>"If pregnant, 2nd or 3rd Trimester?","value"=>false],
            ["key"=>13,"description"=>"Does not have any of the following: HIV, Cancer/ Malignancy, Underwent Transplant, Under Steroid Medication/ Treatment, Bed Ridden, terminal illness, less than 6 months prognosis","value"=>false],
            ["key"=>14,"description"=>"If with mentioned condition/s, specify.","value"=>false],
            ["key"=>15,"description"=>"If with mentioned condition, has presented medical clearance prior to vaccination day?","value"=>false],
        ];

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
        $rules = [
            'assessments' => 'json', # array
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }
        
        /** Get validated data */
        $data = $validator->valid();
        $data['qr_pass_id'] = "263000";
        $data['assessments'] = $this->assessments;

        $assessment = new PreAssessment;
        $assessment->fill($data);
        $assessment->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $rules = [
            'assessments' => 'json', # array
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }
        
        /** Get validated data */
        $data = $validator->valid();

        $assessment = PreAssessment::where('qr_pass_id',$id)->first();

        return $assessment;

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
