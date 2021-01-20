<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Survey;
use App\Http\Resources\SurveyResource;
use App\Http\Resources\SurveyResourceCollection;
use App\Http\Resources\SurveysListResourceCollection;
use App\Traits\Messages;

class SurveyController extends Controller
{

    use Messages;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::paginate(25);

        $data = new SurveysListResourceCollection($surveys);

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
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            // return $validator->errors();
            return $this->jsonErrorDataValidation();
        }

        /** Get validated data */
        $data = $validator->valid();

        $survey = new Survey;
        $survey->fill($data);

        $survey->save();

        $data = new SurveyResource($survey);

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

        $survey = Survey::find($id);        

        if (is_null($survey)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new SurveyResource($survey);

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
        //
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

        $survey = Survey::find($id);        

        if (is_null($survey)) {
			return $this->jsonErrorResourceNotFound();
        }        

        $survey->delete();

        return $this->jsonDeleteSuccessResponse();        
    }

    /**
     * Validation rules
     */
    private function rules()
    {
        return [
            'qr_pass_id' => 'string',
            'last_name' => 'string',
            'first_name' => 'string',
            'middle_name' => 'string',
            'birthdate' => 'date',
            'gender' => 'string',
            'province' => 'string',
            'town_city' => 'string',
            'barangay' => 'string',
            'frontline_health_workers' => 'string',
            'senior_citizens' => 'string',
            'uniformed_personnel' => 'string',
            'teachers' => 'string',
            'social_workers' => 'string',
            'government_employees' => 'string',
            'agriculture_group' => 'string',
            'food_industry' => 'string',
            'tranportation' => 'string',
            'tourism' => 'string',
            'persons_deprived_of_liberty' => 'string',
            'persons_with_disability' => 'string',
            'ofw' => 'string',
            'others_population_group' => 'string',
            'lung_disease' => 'string',
            'kidney_disease' => 'string',
            'diabetes' => 'string',
            'high_blood_pressure' => 'string',
            'cancer' => 'string',
            'leukemia' => 'string',
            'hiv' => 'string',
            'mental_problem' => 'string',
            'others_health_condition' => 'string',
            'none_of_the_above' => 'string',
            'yes_pregnant_baby' => 'string',
            'no_pregnant_baby' => 'string',
            'not_sure_pregnant_baby' => 'string',
            'yes_vaccine' => 'string',
            'no_vaccine' => 'string',
            'yes_contribute' => 'string',
            'no_contribute' => 'string',
            'efficacy_rate_reason' => 'string',
            'vaccine_cost_reason' => 'string',
            'side_effects_reason' => 'string',
            'lack_of_information_reason' => 'string',
            'others_reason' => 'string',
            'one_hundred_percent_fee' => 'string',
            'seventy_five_percent_fee' => 'string',
            'fifty_percent_fee' => 'string',
            'twenty_five_percent_fee' => 'string',
        ];
    }
}
