<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Messages;
use App\Traits\UserLocation;
use Illuminate\Support\Facades\Validator;

use App\Models\Registration;
use App\Http\Resources\RegistrationResource;
use App\Http\Resources\RegistrationResourceCollection;
use App\Http\Resources\RegistrationsListResourceCollection;

class RegistrationController extends Controller
{

    use Messages, UserLocation;

    public function __construct()
	{

		$this->middleware(['auth:api'])->only('index');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wheres = [];

        if (self::userNotAdmin()) {
            $location = self::userLocation();
            $wheres[] = ['town_city_code',$location];
        }

        $registrations = Registration::where($wheres)->paginate(10);

        $data = new RegistrationsListResourceCollection($registrations);

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
            'qr_pass_id' => 'string',
            'first_name' => 'string',
            'middle_name' => 'string',
            'last_name' => 'string',
            'suffix' => 'string',
            'birthdate' => 'string',
            'gender' => 'string',
            'region' => 'string',
            'address' => 'string',
            'barangay' => 'string',
            'town_city' => 'string',
            'province' => 'string',
            'contact_no' => 'string',
            'civil_status' => 'string',
            'priority_group' => 'string',
            'sub_priority_group' => 'string',
            'occupation' => 'string',
            'with_allergy' => 'string',
            'with_comorbidity' => 'string',   
            'is_registered' => 'string',
            'origin' => 'string',
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
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }

        $registration = Registration::find($id);        

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new RegistrationResource($registration);

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

        $registration = Registration::find($id);      

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'qr_pass_id' => 'string',
            'first_name' => 'string',
            'middle_name' => 'string',
            'last_name' => 'string',
            'suffix' => 'string',
            'birthdate' => 'string',
            'gender' => 'string',
            'region' => 'string',
            'address' => 'string',
            'barangay' => 'string',
            'town_city' => 'string',
            'province' => 'string',
            'contact_no' => 'string',
            'civil_status' => 'string',
            'priority_group' => 'string',
            'sub_priority_group' => 'string',
            'occupation' => 'string',
            'with_allergy' => 'string',
            'with_comorbidity' => 'string',
            'is_registered' => 'string',
            'origin' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);        

        /** Get validated data */
        $data = $validator->valid();        
        unset($data['id']);

        $registration->fill($data);

        $registration->save();

        $data = new RegistrationResource($registration);

        return $this->jsonSuccessResponse($data, 200, 'Registration info updated successfully');
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

        $registration = Registration::find($id);        

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }        

        $registration->delete();

        return $this->jsonDeleteSuccessResponse();
    }
}
