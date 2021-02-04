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
            'civil_status' => 'integer',
            'category' => 'integer',
            'category_id' => 'integer',
            'category_id_no' => 'string',
            'employment_status' => 'integer',
            'profession' => 'integer',
            'philhealth' => 'string',
            'employer_name' => 'string',
            'employer_address' => 'string',
            'employer_lgu' => 'string',
            'employer_contact_no' => 'string',
            'pregnancy_status' => 'boolean',
            'with_allergy' => 'boolean',
            'allergy' => 'integer',
            'with_allergy_others' => 'string',
            'with_comorbidity' => 'boolean',
            'comorbidity' => 'integer',
            'with_comorbidity_others' => 'string',
            'diagnosed' => 'boolean',
            'covid_classification' => 'integer',
            'diagnosed_date' => 'string',
            'consent_vaccination' => 'boolean',       
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
