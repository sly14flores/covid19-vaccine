<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
            return $validator->errors();
            // return $this->jsonErrorDataValidation();
        }

        $population_groups = [
            'frontline_health_workers',
            'senior_citizens',
            'uniformed_personnel',
            'teachers',
            'social_workers',
            'government_employees',
            'agriculture_group',
            'food_industry',
            'tranportation',
            'tourism',
            'persons_deprived_of_liberty',
            'persons_with_disability',
            'ofw',
            'others_population_group',
        ];

        /**
         * Currently
         */
        $currently_pregnants = [
            'yes_currently_pregnant',
            'no_currently_pregnant',
            'not_sure_currently_pregnant',
        ];

        /**
         * Planning
         */
        $pregnancys = [
            'yes_pregnant_baby',
            'no_pregnant_baby',        
        ];

        $vaccines = [
            'yes_vaccine',
            'no_vaccine',
        ];

        $reasons = [
            'efficacy_rate_reason',
            'safety_reason',
            'presence_reason',
            'brand_reason',
            'pregnant_reason',
            'lack_of_information_reason',
            'others_reason',
        ];

        $contributes = [
            'yes_contribute',
            'no_contribute',
        ];

        $contributions = [
            'one_hundred_percent_fee',
            'seventy_five_percent_fee',
            'fifty_percent_fee',
            'twenty_five_percent_fee',
            'none_fee',
        ];

        /** Get validated data */
        $data = $validator->valid();

        $survey = new Survey;

        $population_group = $data['population_group'];
        $currently_pregnant = $data['currently_pregnant']; # Currently
        $pregnancy = $data['pregnancy']; # Planning
        $vaccine = $data['vaccine'];
        $reason = $data['reason']; # no
        $contribute = $data['contribute'];
        $contribution = $data['contribution']; # yes contribute

        unset($data['population_group']);
        unset($data['currently_pregnant']); # Currently
        unset($data['pregnancy']); # Planning
        unset($data['vaccine']);
        unset($data['reason']);
        unset($data['contribute']);
        unset($data['contribution']);

        foreach ($population_groups as $pg) {
            $data[$pg] = false;
        }
        $data[$population_group] = true;

        foreach ($currently_pregnants as $cp) { # Currently
            $data[$cp] = false;
        }
        $data[$currently_pregnant] = true;

        foreach ($pregnancys as $p) { # Planning
            $data[$p] = false;
        }
        if ($data['no_currently_pregnant']) {
            $data[$pregnancy] = true;
        }

        foreach ($vaccines as $v) {
            $data[$v] = false;
        }
        $data[$vaccine] = true;

        foreach ($reasons as $r) {
            $data[$r] = false;
        }
        if ($data['no_vaccine']) {
            $data[$reason] = true;
        }

        foreach ($contributes as $c) {
            $data[$c] = false;
        }
        $data[$contribute] = true;

        foreach ($contributions as $c) {
            $data[$c] = false;
        }
        if ($data['yes_contribute']) {
            $data[$contribution] = true;
        }

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
            'population_group' => 'string',
            // 'population_group_other' => 'string',
            'lung_disease' => 'boolean',
            'heart_disease' => 'boolean',
            'kidney_disease' => 'boolean',
            'diabetes' => 'boolean',
            'high_blood_pressure' => 'boolean',
            'cancer' => 'boolean',
            'leukemia' => 'boolean',
            'hiv' => 'boolean',
            'mental_problem' => 'boolean',
            'others_health_condition' => 'boolean',
            // 'health_condition_other' => 'string',
            'none_of_the_above' => 'boolean',
            'pregnancy' => 'string',
            'vaccine' => 'string',
            // 'reason' => 'string',
            // 'reason_other' => 'string',
            // 'contribute' => 'string',
            // 'contribution' => 'string',
        ];
    }
}
