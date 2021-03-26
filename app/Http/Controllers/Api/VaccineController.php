<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Registration;
use App\Models\PreAssessment;
use App\Models\Vaccine;
use App\Models\Barangay;
use App\Models\CityMun;
use App\Models\Province;
use App\Models\QrPass;

use App\Http\Resources\VaccineResource;
use App\Http\Resources\VaccineResourceCollection;
use App\Http\Resources\VaccinesListResourceCollection;
use App\Http\Resources\RegistrationVaccineResource;

use App\Traits\Messages;
use App\Traits\DOHHelpers;
use App\Traits\SelectionsRegistration;

class VaccineController extends Controller
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
        $vaccines = Vaccine::where('qr_pass_id',$id)->get();

        if (is_null($vaccines)) {
			return $this->jsonErrorResourceNotFound();
        }   

        $data = new VaccinesListResourceCollection($vaccines);

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
            'vaccine_name' => 'integer',
            'batch_number' => 'integer',
            'lot_number' => 'integer',
            'dose' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }         

        /** Get validated data */
        $data = $validator->valid();
        $id = Auth::guard('api')->id();
        $data['user_id'] = $id;

        $vaccine = new Vaccine;
        $vaccine->fill($data);

        $vaccine->save();

        $data = new VaccineResource($vaccine);

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

        $vaccine = Vaccine::find($id);        

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new VaccineResource($vaccine);

        return $this->jsonSuccessResponse($data, 200, 'Vaccine added successfully');
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

        $vaccine = Vaccine::find($id);      

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'qr_pass_id' => 'string',
            'vaccine_name' => 'integer',
            'batch_number' => 'integer',
            'lot_number' => 'integer',
            'dose' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules);        

        /** Get validated data */
        $data = $validator->valid();        
        $id = Auth::guard('api')->id();
        $data['user_id'] = $id;

        $vaccine->fill($data);

        $vaccine->save();

        $data = new VaccineResource($vaccine);

        return $this->jsonSuccessResponse($data, 200, 'Vaccine info updated successfully'); 
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

        $vaccine = Vaccine::find($id);        

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }        

        $vaccine->delete();

        return $this->jsonDeleteSuccessResponse();
    }

    public function qrRegistration(Request $request, $id)
    {
        $registration = Registration::where('qr_pass_id',$id)->first();

        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }        

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }

        /**
         * Create Pre Assessment
         */
        $check_assessment = PreAssessment::where('qr_pass_id',$id)->get();
        if (count($check_assessment)==0) {
            $assessment = [
                'qr_pass_id' => $id,
                'consent' => false,
                'reason' => '',
                'assessments' => config('constants.assessments')
            ];
            $pre = new PreAssessment;
            $pre->fill($assessment);
            $pre->save();
        }

        $data = new RegistrationVaccineResource($registration);

        return $this->jsonSuccessResponse($data, 200);
    }

    public function updateRegistration(Request $request, $id) # qr_pass_id
    {

        $rules = [
            'id' => 'integer',
            'qr_pass_id' => 'string',
            'first_name' => 'string',
            'middle_name' => 'string',
            'last_name' => 'string',
            'suffix' => 'string',
            'birthdate' => 'string',
            'gender' => 'string',
            'address' => 'string',
            'barangay' => 'integer',
            'town_city' => 'integer',
            'province' => 'integer',
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
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }

        /** Get validated data */
        $data = $validator->valid();

        $barangay = Barangay::where('brgyCode',$data['barangay'])->first();
        $data['barangay'] = $this->toDOHBrgy($barangay);
        $town_city = CityMun::where('citymunCode',$data['town_city'])->first();
        $data['town_city'] = $this->toDOHMun($town_city);
        $province = Province::where('provCode',$data['province'])->first();
        $data['province'] = $this->toDOHProv($province);

        $registration = Registration::where('qr_pass_id',$id)->first();
        $registration->fill($data);
        $registration->save();

        /**
         * Update NAPANAM Info
         */
        // Map data
        $napanam = [
            'id' => $data['id'],
            'name' => "{$data['last_name']} {$data['first_name']} {$data['middle_name']}",
            'lastname' => $data['last_name'],
            'firstname' => $data['first_name'],
            'middlename' => $data['middle_name'],
            'gender' => $this->dohToGender($data['gender']),
            'nationality' => 'PHL', # PHL
            'dob' => $data['birthdate'],
            'age' => $this->computeAge($data['birthdate']),
            'mobile_number' => $data['contact_no'],
            'email' => null,
            'address' => $data['address'], # Street / Road
            'addressbrgy' => $this->dohToBrgy($data['barangay']),
            'addressmunicity' => $this->dohToMun($data['town_city']),
            'addressprovince' => $this->dohToProv($data['province']),
        ];

        $update_napanam = QrPass::find($id);
        $update_napanam->fill($napanam);
        $update_napanam->save();

        return $this->jsonSuccessResponse(new RegistrationVaccineResource($registration), 200, 'Registration info updated successfully');         

    }
}
