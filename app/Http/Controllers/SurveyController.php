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
            'qr_pass_id' => 'integer',
            'last_name' => 'string',
            'first_name' => 'string',
            'middle_name' => 'string',
            'birthdate' => 'date',
            'gender' => 'string',
            'province' => 'string',
            'town_city' => 'string',
            'barangay' => 'string',
            // 'frontline_health_workers' => 'boolean',
            // 'senior_citizens' => 'boolean',
            // 'uniformed_personnel' => 'boolean',
            // 'teachers' => 'boolean',
            // 'social_workers' => 'boolean',
            // 'government_employees' => 'boolean',
            // 'agriculture_group' => 'boolean',
            // 'food_industry' => 'boolean',
            // 'tranportation' => 'boolean',
            // 'tourism' => 'boolean',
            // 'persons_deprived_of_liberty' => 'boolean',
            // 'persons_with_disability' => 'boolean',
            // 'ofw' => 'boolean',
            // 'others_population_group' => 'string',
            // 'lung_disease' => 'boolean',
            // 'heart_disease' => 'boolean',
            // 'kidney_disease' => 'boolean',
            // 'diabetes' => 'boolean',
            // 'high_blood_pressure' => 'boolean',
            // 'cancer' => 'boolean',
            // 'leukemia' => 'boolean',
            // 'hiv' => 'boolean',
            // 'mental_problem' => 'boolean',
            // 'others_health_condition' => 'string',
            // 'none_of_the_above' => 'boolean',
            // 'yes_pregnant_baby' => 'boolean',
            // 'no_pregnant_baby' => 'boolean',
            // 'not_sure_pregnant_baby' => 'boolean',
            // 'yes_vaccine' => 'boolean',
            // 'no_vaccine' => 'boolean',
            // 'yes_contribute' => 'boolean',
            // 'no_contribute' => 'boolean',
            // 'efficacy_rate_reason' => 'boolean',
            // 'vaccine_cost_reason' => 'boolean',
            // 'side_effects_reason' => 'boolean',
            // 'lack_of_information_reason' => 'boolean',
            // 'others_reason' => 'string',
            // 'one_hundred_percent_fee' => 'boolean',
            // 'seventy_five_percent_fee' => 'boolean',
            // 'fifty_percent_fee' => 'boolean',
            // 'twenty_five_percent_fee' => 'boolean',
        ];
    }
}
