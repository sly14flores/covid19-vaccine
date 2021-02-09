<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Messages;
use Illuminate\Support\Facades\Validator;

use App\Models\Registration;
use App\Http\Resources\RegistrationResource;

class RegistrationController extends Controller
{

    use Messages;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'first_name' => 'string',
            'middle_name' => 'string',
            'last_name' => 'string',
            'suffix' => 'string',
            'birthdate' => 'string',
            'gender' => 'string',
            'address' => 'string',
            'barangay' => 'string',
            'town_city' => 'string',
            'province' => 'string',
            'contact_no' => 'string',
            'civil_status' => 'string',
            'category' => 'string',
            'category_id' => 'string',
            'category_id_no' => 'string',
            'employment_status' => 'string',
            'profession' => 'string',
            'philhealth' => 'string',
            'employer_name' => 'string',
            'employer_address' => 'string',
            // 'employer_lgu' => 'string',
            'employer_contact_no' => 'string',
            'pregnancy_status' => 'string',
            'with_allergy' => 'string',
            // 'allergy' => 'string',
            // 'with_allergy_others' => 'string',
            'with_comorbidity' => 'string',
            // 'comorbidity' => 'string',
            // 'with_comorbidity_others' => 'string',
            'diagnosed' => 'string',
            'covid_classification' => 'string',
            'diagnosed_date' => 'date',
            'consent_vaccination' => 'string',
            'region' => 'string',
            'employer_municipality' => 'string',
            'pwd_id' => 'string',
            'direct_interaction' => 'string',
            'drug_allergy' => 'string',
            'food_allergy' => 'string',
            'insect_allergy' => 'string',
            'latex_allergy' => 'string',
            'mold_allergy' => 'string',
            'pet_allergy' => 'string',
            'pollen_allergy' => 'string',
            'hypertension' => 'string',
            'heart_disease' => 'string',
            'kidney_disease' => 'string',
            'diabetes_mellitus' => 'string',
            'bronchial_asthma' => 'string',
            'immuno_deficiency_status' => 'string',
            'cancer' => 'string',
            'comorbidity_others' => 'string',          
        ];

        $validator = Validator::make($request->all(), $rules);

        /** Get validated data */
        $data = $validator->valid();
        
        $registration = new Registration;
        $registration->fill($data);
        $registration->save();

        $data = new RegistrationResource($registration);

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
        //
    }
}
