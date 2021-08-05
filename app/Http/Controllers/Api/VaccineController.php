<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Builder;

use App\Models\Registration;
use App\Models\Vaccine;
use App\Models\Dosage;
use App\Models\PreAssessment;
use App\Models\PostAssessment;
use App\Models\Barangay;
use App\Models\CityMun;
use App\Models\Province;
use App\Models\QrPass;
use App\Models\ScreeningVital;
use App\Models\MonitoringVital;
use App\Models\Aefi;
use App\Models\Hospital;

use App\Http\Resources\VaccineResource;
use App\Http\Resources\VaccineResourceCollection;
use App\Http\Resources\VaccinesListResourceCollection;
use App\Http\Resources\RegistrationVaccineResource;
use App\Http\Resources\RegistrationsListResourceCollection;
use App\Http\Resources\VaccineScreeningInfo;
use App\Http\Resources\VaccineInoculationInfo;
use App\Http\Resources\VaccineMonitoringInfo;

use App\Traits\Messages;
use App\Traits\DOHHelpers;
use App\Traits\SelectionsRegistration;
use App\Traits\Vaccinations;
use App\Traits\Dumper;
use App\Helpers\General\CollectionHelper;

use Illuminate\Support\LazyCollection;

use Carbon\Carbon;
use App\Rules\ExcelRule;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as PODate;

use App\Events\ImportInoculationMonitor;

class VaccineController extends Controller
{
    use Messages, DOHHelpers, SelectionsRegistration, Vaccinations, Dumper;

    private $http_code_ok;
    private $http_code_error;    

	public function __construct()
	{
		$this->middleware(['auth:api']);
		
        $this->http_code_ok = 200;
        $this->http_code_error = 500;

	}

    /**
     * Display List of vaccinations
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccines = Vaccine::paginate(10);

        if (is_null($vaccines)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new VaccinesListResourceCollection($vaccines);

        return $this->jsonSuccessResponse($data, 200);
    }

    /**
     * @group Vaccination List
     * 
     * List for registered persons for vaccination
     * 
     * Search registrations by QR, first name, middle name, last name for vaccinations
     * 
     * @queryParam search string
     * @queryParam phase string
     * 
     */
    public function searchRegistrations(Request $request)
    {
        $search = (isset($request->search))?$request->search:null;
        $phase = (isset($request->phase))?$request->phase:'screening';

        /**
         * Get user municipality / city
         */
        $user = Auth::guard('api')->user();
        $town_city_code = $user->userHospital->location ?? null;

        $location = [];
        if (!$user->isAdmin()) {
            $location = [['town_city_code',$town_city_code]];
        }

        if ($phase == "screening") {
            /**
             * no vaccine-dose / and at least 1 dose
             */
            $registrations = Registration::where($location)->where(function(Builder $query) {
                $query->notFirstDoseScreened()->orNotSecondDoseScreened();
            });
            $this->dumpToSlack($registrations->toSql(),"screening");
            $registrations = $registrations->get();
        } else if ($phase == "monitoring") {
            /**
             * date_of_vaccination not null
             */
            $registrations = Registration::where($location)->where(function(Builder $query) {
                $query->firstDoseScreened()->firstDose();
            })->orWhere(function(Builder $query) {
                $query->secondDoseScreened()->secondDose();
            });
            $this->dumpToSlack($registrations->toSql(),"monitoring");
            $registrations = $registrations->get();
        } else {
            $registrations = Registration::where($location)->get();
        }

        $registrations = $registrations->filter(function($registration) use ($search) {
            $text = "{$registration->qr_pass_id} {$registration->first_name}, {$registration->middle_name}, {$registration->last_name}";            
            $registration->text = $text;
            if (is_null($search)) return true;
            $search = preg_replace('/[^A-Za-z0-9\s\-]/', '', $search);
            $pattern = "/".str_replace(" ","(.*)",$search)."/i";        
            return preg_match($pattern, $text);
        });

        $paginated = CollectionHelper::paginate($registrations, 10);

        $data = new RegistrationsListResourceCollection($paginated);
        
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
            'vaccination_facility' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }  

        /** Get validated data */
        $data = $validator->valid();

        $vaccine = new Vaccine;
        $vaccine->fill($data);
        $vaccine->save();

        $data = new VaccineResource($vaccine);

        return $this->jsonSuccessResponse($data, 200);
        
    }

    /**
     * Show vaccine administration
     * 
     * Vaccine administration with dosages
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }

        $vaccine = Vaccine::where('qr_pass_id',$id)->first();

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new VaccineResource($vaccine);

        return $this->jsonSuccessResponse($data, 200);
    }

    /**
     * @group Screening
     * 
     * Personal Info for Screening
     * 
     * @bodyParam dose integer required Example: 1
     */
    public function screeningPersonalInfo(Request $request, $id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }
        
        $registration = Registration::where('qr_pass_id',$id)->first();

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'dose' => 'integer',
        ];    
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }
        /** Get validated data */
        $data = $validator->valid();            

        /**
         * Check entry in vaccine
         * If an entry exists fetch it
         * Otherwise insert one
         */
        $q_vaccine = Vaccine::where('qr_pass_id',$id)->first();

        if (is_null($q_vaccine)) { # insert record
            $d = [
                'qr_pass_id' => $id,
            ];
            $vaccine = new Vaccine;
            $vaccine->fill($d);
            $vaccine->save();
        } else { # use existing record
            $vaccine = $q_vaccine;
        }

        /**
         * Check if dose already exists
         * If no insert one
         * Otherwise use existing
         */
        $dose = $data['dose'];
        $q_dosage = Dosage::where([['qr_pass_id',$id],['dose',$dose]])->first();

        if (is_null($q_dosage)) {
            $dosage = new Dosage;
            $dosage->fill([
                'qr_pass_id' => $id,
                'dose' => $dose,
            ]);
            $vaccine->dosages()->save($dosage);
        } else {
            $dosage = $q_dosage;
        }

        /**
         * Check if pre assessment has entry
         * If yes fetch it
         * Otherwise insert one
         */
        $q_pre_assessment = PreAssessment::where([['dosage_id',$dosage->id],['dose',$dose]])->first();

        if (is_null($q_pre_assessment)) {
            $pre_assessment = new PreAssessment;
            $pre_assessment->fill([
                'qr_pass_id' => $id,
                'dose' => $dose,
                'assessments' => config('constants.pre_assessments')
            ]);
            $dosage->pre_assessment()->save($pre_assessment);
        } else {
            $pre_assessment = $q_pre_assessment;
        }

        $result = new VaccineScreeningInfo($registration);

        return $this->jsonSuccessResponse($result, 200);        
        
    }

    /**
     * @group Inoculation
     * 
     * Personal Info for Inoculation
     * 
     * Returns 200 if patient has been screened.
     * Returns selected dose vital signs along with inoculation and diluent data
     * Returns 406 if patient is not yet screened
     * 
     * @bodyParam dose integer required Example: 1
     */
    public function inoculationPersonalInfo(Request $request, $id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }
        
        $registration = Registration::where('qr_pass_id',$id)->first();

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'dose' => 'integer',
        ];    
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }
        /** Get validated data */
        $data = $validator->valid();

        /**
         * Validate if passed screening
         * Patient passes screening if they have pre_assessments data are marked as screened
         */
        $dose = $data['dose'];
        $check_pre = PreAssessment::where([['qr_pass_id',$id],['dose',$dose]])->first();

        // if (is_null($check_pre)) {
        //     return $this->jsonFailedResponse(null, 406, "Patient has not been screened yet");
        // }

        // if ($check_pre!=null && (is_null($check_pre->screened) || !$check_pre->screened)) {
        //     return $this->jsonFailedResponse(null, 406, "Patient has not been screened yet");
        // }

        $result = new VaccineInoculationInfo($registration);

        return $this->jsonSuccessResponse($result, 200);


    }

    /**
     * @group Monitoring
     * 
     * Personal Info for Monitoring
     * 
     * @bodyParam dose integer required Example: 1
     */
    public function monitoringPersonalInfo(Request $request, $id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false ) {
            return $this->jsonErrorInvalidParameters();
        }
        
        $registration = Registration::where('qr_pass_id',$id)->first();

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'dose' => 'integer',
        ];    
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }
        /** Get validated data */
        $data = $validator->valid();

        /**
         * Validate if for monitoring
         * Patient passes screening if they have pre_assessments data are marked as screened
         */
        $dose = $data['dose'];
        $check_dose = Dosage::where([['qr_pass_id',$id],['dose',$dose]])->first();

        // if (is_null($check_dose)) {
        //     return $this->jsonFailedResponse(null, 406, "Patient has not been vaccinated yet");
        // }

        // if (($check_dose!=null) && (is_null($check_dose->date_of_vaccination))) {
        //     return $this->jsonFailedResponse(null, 406, "Patient has not been vaccinated yet");
        // }

        /**
         * Check if post assessment has entry
         * If yes fetch it
         * Otherwise insert one
         */
        $q_post_assessment = PostAssessment::where([['dosage_id',$check_dose->id],['dose',$dose]])->first();

        if (is_null($q_post_assessment)) {
            $post_assessment = new PostAssessment;
            $post_assessment->fill([
                'qr_pass_id' => $id,
                'dose' => $dose,
                'assessments' => config('constants.post_assessments')
            ]);
            $check_dose->post_assessment()->save($post_assessment);
        } else {
            $post_assessment = $q_post_assessment;
        }

        /**
         * Check if has aefi entry
         * If yes fetch it
         * Otherwise insert one
         */
        $q_aefi = Aefi::where([['dosage_id',$check_dose->id],['dose',$dose]])->first();
        if (is_null($q_aefi)) {
            $aefi = new Aefi;
            $aefi->fill([
                'qr_pass_id' => $id,
                'dose' => $dose,
            ]);
            $check_dose->aefi()->save($aefi);
        } else {
            $aefi = $q_aefi;
        }

        $result = new VaccineMonitoringInfo($registration);

        return $this->jsonSuccessResponse($result, 200);

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
        // return $request->all();
        $vaccine = Vaccine::where('qr_pass_id',$id)->first();

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            // 'facility_others' => 'string',
            'vaccination_session' => 'integer',
            'vaccination_facility' => 'integer',
            'dosages' => 'array',
            'delete' => 'array'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }        

        /** Get validated data */
        $data = $validator->valid();

        $dosages = (isset($data['dosages']))?$data['dosages']:[];

        /**
         * Get encoder
         */
        $encoder_user_id = Auth::guard('api')->id();

        foreach ($dosages as $dosage) {
            $dosage['encoder_user_id'] = $encoder_user_id;
            $dosage['vaccination_facility'] = $data['vaccination_facility'];
            $pre_assessment = $dosage['pre_assessment'];
            $post_assessment = $dosage['post_assessment'];
            // Check if dose already exists
            $check_dose = Dosage::where([['qr_pass_id',$id],['dose',$dosage['dose']]])->first();
            if ($dosage['id']) {
                $update_dosage = Dosage::find($dosage['id']);
                $update_dosage->fill($dosage);
                $vaccine->dosages()->save($update_dosage);
                $this->pre_assessment($update_dosage,$pre_assessment);
                $this->post_assessment($update_dosage,$post_assessment);              
            } else {
                if (is_null($check_dose)) {
                    $new_dosage = new Dosage;
                    $new_dosage->fill($dosage);
                    $vaccine->dosages()->save($new_dosage);
                    $this->pre_assessment($new_dosage,$pre_assessment);
                    $this->post_assessment($new_dosage,$post_assessment);
                }            
            }
        }

        $vaccine->fill($data);
        $vaccine->save();

        /**
         * Delete dosages
         */
        $delete = $data['delete'];
        Dosage::whereIn('id', $delete)->delete();

        $data = new VaccineResource($vaccine);

        return $this->jsonSuccessResponse($data, 200);
    }

    public function pre_assessment($dosage,$assessment)
    {
        $assessment['dose'] = $dosage['dose'];
        if ($assessment['id']) {
            $pre = PreAssessment::find($assessment['id']);
            $pre->fill($assessment);
            $dosage->pre_assessment()->save($pre);
        } else {
            $pre = new PreAssessment;
            $pre->fill($assessment);
            $dosage->pre_assessment()->save($pre);
        }
    }

    public function post_assessment($dosage,$assessment)
    {
        $assessment['dose'] = $dosage['dose'];
        if ($assessment['id']) {
            $post = PostAssessment::find($assessment['id']);
            $post->fill($assessment);
            $dosage->post_assessment()->save($post);
        } else {
            $post = new PostAssessment;
            $post->fill($assessment);
            $dosage->post_assessment()->save($post);
        }
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
         * Create Vaccine
         */
        $user = Auth::guard('api')->user();        
        $user_hospital = (is_null($user->userHospital))?null:$user->userHospital->id;
        $vaccine = [
            'qr_pass_id' => $id,
            'vaccination_facility' => $user_hospital,
        ];

        $check_va = Vaccine::where('qr_pass_id',$id)->first();

        if (is_null($check_va)) {

            $new_vaccine = new Vaccine;
            $new_vaccine->fill($vaccine);
            $new_vaccine->save();

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
            'last_name' => 'string',
            'suffix' => 'string',
            'birthdate' => 'string',
            'gender' => 'string',
            'barangay' => 'string',
            'town_city' => 'string',
            'province' => 'string',
            'contact_no' => 'string',
            'priority_group' => 'string',
            'sub_priority_group' => 'string',
            'allergic_to_vaccines' => 'string',
            'is_registered' => 'string',
            'with_comorbidity' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }

        /** Get validated data */
        $data = $validator->valid();

        // $barangay = Barangay::where('brgyCode',$data['barangay'])->first();
        // $data['barangay'] = $this->toDOHBrgy($barangay);
        // $town_city = CityMun::where('citymunCode',$data['town_city'])->first();
        // $data['town_city'] = $this->toDOHMun($town_city);
        // $province = Province::where('provCode',$data['province'])->first();
        // $data['province'] = $this->toDOHProv($province);

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
            // 'address' => $data['address'], # Street / Road
            'addressbrgy' => $this->dohToBrgy($data['barangay']),
            'addressmunicity' => $this->dohToMun($data['town_city']),
            'addressprovince' => $this->dohToProv($data['province']),
        ];

        $update_napanam = QrPass::find($id);
        $update_napanam->fill($napanam);
        $update_napanam->save();

        return $this->jsonSuccessResponse(new RegistrationVaccineResource($registration), 200, 'Registration info updated successfully');         

    }

    /**
     * @group Screening
     * 
     * Update screening per dose
     * 
     * @bodyParam id string required
     * @bodyParam dosage_id integer required
     * @bodyParam dose integer required
     * @bodyParam pre_assessment object required
     * @bodyParam pre_assessment.dose integer required
     * @bodyParam pre_assessment.dosage_id integer required
     * @bodyParam pre_assessment.consent string required
     * @bodyParam pre_assessment.user_id integer
     * @bodyParam pre_assessment.reason string required
     * @bodyParam pre_assessment.screened boolean required
     * @bodyParam pre_assessment.remarks string
     * @bodyParam pre_assessment.assessments object[]
     * @bodyParam pre_assessment.assessments[].key integer
     * @bodyParam pre_assessment.assessments[].description string
     * @bodyParam pre_assessment.assessments[].value boolean
     * @bodyParam vitals object[]
     * @bodyParam vitals[].dose integer
     * @bodyParam dels integer[]
     * 
     */
    public function updateScreening(Request $request)
    {
        $rules = [
            'id' => 'string',
            'dosage_id' => 'integer',
            'dose' => 'integer',
            'screened' => 'boolean',
            'vitals' => 'array',
            'pre_assessment' => 'array',
        ];        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }
        /** Get validated data */
        $data = $validator->valid();

        $qr_pass_id = $data['id'];
        $dosage_id = $data['dosage_id'];
        $dose = $data['dose'];
        $vitals = $data['vitals'];
        $pre_assessment = $data['pre_assessment'];
        $dels = $data['dels'];

        $dosage = Dosage::find($dosage_id);
        $preAssessment = PreAssessment::where('dosage_id',$dosage_id)->first();
        $pre_assessment_update = [
            'user_id' => $pre_assessment['user_id'],
            'consent' => $pre_assessment['consent'],
            'screened' => $pre_assessment['screened'],
            'remarks' => $pre_assessment['remarks'],
            'reason' => $pre_assessment['reason'],
            'assessments' => $pre_assessment['assessments'],
        ];

        $preAssessment->fill($pre_assessment_update);
        $preAssessment->save();

        if ($dose == 1) {
            $this->firstDoseScreened($qr_pass_id,$pre_assessment['screened']);
        }
        if ($dose == 2) {
            $this->secondDoseScreened($qr_pass_id,$pre_assessment['screened']);
        }

        /**
         * Save vitals
         */
        foreach($vitals as $vitalData) {
            if ($vitalData['id']) {
                $vital = ScreeningVital::find($vitalData['id']);
            } else {
                $vital = new ScreeningVital;
            }
            $vitalData['dose'] = $dose;
            $vital->fill($vitalData);
            $dosage->vitals()->save($vital);
        }

        /**
         * Delete vitals
         */
        if (count($dels)) {
            $vitals = ScreeningVital::whereIn('id',$dels)->delete();
        }

        $registration = Registration::where('qr_pass_id',$qr_pass_id)->first();
        
        $result = new VaccineScreeningInfo($registration);

        return $this->jsonSuccessResponse($result, 200);      

    }

    /**
     * @group Inoculation
     * 
     * Update inoculation information
     * 
     * @bodyParam id integer required This is dosage id not qr pass id.
     * @bodyParam brand_name integer required
     * @bodyParam date_of_vaccination date required
     * @bodyParam time_of_vaccination time required
     * @bodyParam site_of_injection string required
     * @bodyParam lot_number string required
     * @bodyParam batch_number string required
     * @bodyParam vaccination_facility integer required
     * @bodyParam user_id integer required
     * @bodyParam encoder_user_id integer required
     * @bodyParam diluent string required
     * @bodyParam date_of_reconstitution date required
     * @bodyParam time_of_reconstitution time required
     * @bodyParam diluent_lot_number integer required
     * @bodyParam diluent_batch_number integer required
     * @bodyParam next_vaccination date required
     * @bodyParam dose integer required
     */
    public function updateInoculation(Request $request) {

        $rules = [
            'id' => 'integer',
            'brand_name' => 'integer',
            'date_of_vaccination' => 'date',
            'time_of_vaccination' => 'string',
            'site_of_injection' => 'string',
            'lot_number' => 'string',
            'batch_number' => 'string',
            'vaccination_facility' => 'integer',
            'user_id' => 'integer',
            'encoder_user_id' => 'integer',
            // 'diluent' => 'string',
            // 'date_of_reconstitution' => 'date',
            // 'time_of_reconstitution' => 'string',
            // 'diluent_lot_number' => 'string',
            // 'diluent_batch_number' => 'string',
            'next_vaccination' => 'date',
            'dose' => 'integer',
        ];     
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
            return $this->jsonErrorDataValidation();
        }
        /** Get validated data */
        $data = $validator->valid();
        $dosage = Dosage::find($data['id']);

        if (is_null($dosage)) {
            return $this->jsonErrorResourceNotFound();
        }

        $dosage->fill($data);
        $dosage->save();

        if ($data['dose'] == 1) {
            $this->firstDose($dosage->qr_pass_id,true);
        }

        if ($data['dose'] == 2) {
            $this->secondDose($dosage->qr_pass_id,true);
        }

        $registration = Registration::where('qr_pass_id',$dosage->qr_pass_id)->first();
        
        $result = new VaccineInoculationInfo($registration);

        return $this->jsonSuccessResponse($result, 200);

    }

    /**
     * @group Monitoring
     * 
     * Update monitoring per dose
     * 
     * @bodyParam id string required This is qr_pass_id
     * @bodyParam dosage_id integer required
     * @bodyParam aefi object[]
     * @bodyParam aefi[].dose integer required
     * @bodyParam aefi[].has_adverse_event boolean required
     * @bodyParam aefi[].adverse_event_condition string
     * @bodyParam aefi[].other_adverse_event_condition string
     * @bodyParam vitals object[]
     * @bodyParam vitals[].dose integer
     * @bodyParam vitals[].date_collected string
     * @bodyParam vitals[].time_collected string
     * @bodyParam vitals[].systolic string
     * @bodyParam vitals[].diastolic string
     * @bodyParam vitals[].pulse_rate string
     * @bodyParam vitals[].temperature string
     * @bodyParam vitals[].respiratory_rate string
     * @bodyParam vitals[].oxygen string
     * @bodyParam vitals[].pain_score string
     * @bodyParam dels integer[]
     * 
     */
    public function updateMonitoring(Request $request)
    {
        $rules = [
            'id' => 'string',
            'dosage_id' => 'integer',
            'dose' => 'integer',
            'vitals' => 'array',
            'dels' => 'array',
            // 'post_assessment' => 'array',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        }
        /** Get validated data */
        $data = $validator->valid();

        $qr_pass_id = $data['id'];
        $dosage_id = $data['dosage_id'];
        $dose = $data['dose'];
        $aefi = $data['aefi'];
        $vitals = $data['vitals'];
        $dels = $data['dels'];

        // $aefi['has_adverse_event'] = ($aefi['has_adverse_event']==="true")?true:false;

        $dosage = Dosage::find($dosage_id);
        $update_aefi = Aefi::where('dosage_id',$dosage_id)->first();
        $update_aefi->fill($aefi);
        $dosage->aefi()->save($update_aefi);

        /**
         * Save vitals
         */
        foreach($vitals as $vitalData) {
            if ($vitalData['id']) {
                $vital = MonitoringVital::find($vitalData['id']);
            } else {
                $vital = new MonitoringVital;
            }
            $vitalData['dose'] = $dose;
            $vital->fill($vitalData);
            $dosage->monitoringVitals()->save($vital);
        }

        /**
         * Delete vitals
         */
        if (count($dels)) {
            $vitals = MonitoringVital::whereIn('id',$dels)->delete();
        }

        $registration = Registration::where('qr_pass_id',$qr_pass_id)->first();
        
        $result = new VaccineMonitoringInfo($registration);

        return $this->jsonSuccessResponse($result, 200);      

    }

    public function upload(Request $request)
    {

		$rules = [
			'excel' => ['required',new ExcelRule($request->file('excel'))],
		];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->jsonErrorDataValidation();
        };

        $hospital = Auth::user()->hospital;
        if (is_null($hospital)) {
            $hospital = Str::random(10);
        }

        $path = "vas/$hospital/";
        $filename = Str::random(40).".".$request->file('excel')->getClientOriginalExtension();

        $request->file('excel')->storeAs($path, $filename);

        return $this->jsonCreateSuccessResponse([
            'filename' => $filename,
            'path' => $path
        ]);

    }

    /**
     * Check if excel file has correct structures
     */
    public function check(Request $request)
    {

        $id = Auth::guard('api')->id();
        $excel = $request->excel;
        $path = $request->path;

        $file_path = storage_path()."/app/{$path}{$excel}";      

        $properties = [
            "priority_group", # 0 registrations
            "qr_pass_id", # 1 registrations
            "pwd_id", # 2 registrations
            "indigenous_member", # 3 registrations
            "last_name", # 4 registrations
            "first_name", # 5 registrations
            "middle_name", # 6 registrations
            "suffix", # 7 registrations
            "contact_no", # 8 registrations
            "region", # 9 registrations
            "province", # 10 registrations
            "town_city", # 11 registrations
            "barangay", # 12 registrations
            "gender", # 13 registrations
            "birthdate", # 14 registrations
            "deferral", # 15 pre_assessments / deferral: Y|N
            "reason", # 16 pre_assessments / reason for deferral
            "date_of_vaccination", # 17* dosages
            "brand_name", # 18* dosages
            "batch_number", # 19* dosages
            "lot_number", # 20* dosages
            "cbcr_id", # 21* hospitals
            "vaccinator_name", # 22* dosages / vaccinator name
            "dose1", # 23* dosages / first dose
            "dose2", # 24* dosages / second dose
            "has_adverse_event", # 25* aefis / adverse event
            "adverse_event_condition", # 26* aefis / adverse event condition
        ];

        $categories = collect($this->priorityGroupValue())->pluck('id');
        $categories = $categories->map(function($cat) {
            $exp = explode("_",$cat);
            return $exp[1];
        });

        $indigenous = collect($this->indigenousValue())->pluck('id');

        $regions = collect($this->regionValue())->pluck('id');

        $provinces = $this->provinceVasValue();

        $brands = collect($this->brandValue())->pluck('shortname');

        $cbcrs = collect(Hospital::all())->pluck('cbcr_id');

        $adverse_event_conditions = collect($this->adverseEventsValue())->pluck('id');

        // $this->dumpToSlack($adverse_event_conditions->toArray(),"CATEGORY");

        $validations = [
            "priority_group" => [
                'header' => 'CATEGORY',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => $categories->toArray(),
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "CATEGORY is not defined",
                'message_formatted' => "Invalid value for CATEGORY",
            ], # 0 registrations
            "qr_pass_id" => [
                'header' => 'UNIQUE_PERSON_ID',
                'required' => true,
                'required_if' => null,                
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "UNIQUE_PERSON_ID is not defined",
                'message_formatted' => null,
            ], # 1 registrations
            "pwd_id" => [
                'header' => 'PWD',
                'required' => false,
                'required_if' => null,                
                'formatted' => true,
                'formats' => ["Y","N"],
                'default_no' => true,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => null,
                'message_formatted' => "Invalid value for PWD",         
            ], # 2 registrations
            "indigenous_member" => [
                'header' => 'Indigenous Member',
                'required' => false,
                'required_if' => null,
                'formatted' => true,
                'formats' => $indigenous->toArray(),
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => null,
                'message_formatted' => "Invalid value for Indigenous Member",             
            ], # 3 registrations
            "last_name" => [
                'header' => 'LAST_NAME',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "LAST_NAME is not defined",
                'message_formatted' => null,                
            ], # 4 registrations
            "first_name" => [
                'header' => 'FIRST_NAME',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "FIRST_NAME is not defined",
                'message_formatted' => null,                             
            ], # 5 registrations
            "middle_name" => [
                'header' => 'MIDDLE_NAME',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "MIDDLE_NAME is not defined",
                'message_formatted' => null,                           
            ], # 6 registrations
            "suffix" => [
                'header' => 'SUFFIX',
                'required' => false,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => true,
                'none_if_empty' => false,
                'message' => null,
                'message_formatted' => null,                
            ], # 7 registrations
            "contact_no" => [
                'header' => 'CONTACT_NO',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "CONTACT_NO is not defined",
                'message_formatted' => null,                               
            ], # 8 registrations
            "region" => [
                'header' => 'REGION',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => $regions,
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "REGION is not defined",
                'message_formatted' => "Invalid value for REGION",                               
            ], # 9 registrations
            "province" => [
                'header' => 'PROVINCE',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => $provinces,
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "PROVINCE is not defined",
                'message_formatted' => "Invalid value for PROVINCE",                       
            ], # 10 registrations
            "town_city" => [
                'header' => 'MUNI_CITY',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "MUNI_CITY is not defined",
                'message_formatted' => "Invalid value for MUNI_CITY",                   
            ], # 11 registrations
            "barangay" => [
                'header' => 'BARANGAY',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => null,
                'message_formatted' => null,                
            ], # 12 registrations
            "gender" => [
                'header' => 'SEX',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => ["M","F"],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "SEX in not defined",
                'message_formatted' => "Invalid value for SEX",                
            ], # 13 registrations
            "birthdate" => [
                'header' => 'BIRTHDATE',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "BIRTHDATE is not defined",
                'message_formatted' => null,                             
            ], # 14 registrations / m/d/Y
            "deferral" => [
                'header' => 'DEFERRAL',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => ["Y","N"],
                'default_no' => true,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "DEFERRAL is not defined",
                'message_formatted' => "Invalid value for DEFERRAL",                       
            ], # 15 pre_assessments / deferral: Y|N
            "reason" => [
                'header' => 'REASON_FOR_DEFERRAL',
                'required' => false, # true if reason is Y
                'required_if' => 'deferral',
                'formatted' => true,
                'formats' => $this->deferralValue(),
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "REASON_FOR_DEFERRAL is not defined",
                'message_formatted' => "Invalid value for REASON_FOR_DEFERRAL",                       
            ], # 16 pre_assessments / reason for deferral / m/d/Y
            "date_of_vaccination" => [
                'header' => 'VACCINATION_DATE',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "VACCINATION_DATE is not defined",
                'message_formatted' => null,                  
            ], # 17* dosages
            "brand_name" => [
                'header' => 'VACCINE_MANUFACTURER_NAME',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => $brands->toArray(),
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "VACCINE_MANUFACTURER_NAME is not defined",
                'message_formatted' => "Invalid value for VACCINE_MANUFACTURER_NAME",
            ], # 18* dosages
            "batch_number" => [
                'header' => 'BATCH_NUMBER',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "BATCH_NUMBER is not defined",
                'message_formatted' => null,                       
            ], # 19* dosages
            "lot_number" => [
                'header' => 'LOT_NO',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "LOT_NO is not defined",
                'message_formatted' => null,      
            ], # 20* dosages
            "cbcr_id" => [
                'header' => 'BAKUNA_CENTER_CBCR_ID',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => $cbcrs,
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "BAKUNA_CENTER_CBCR_ID is not defined",
                'message_formatted' => "Invalid value for BAKUNA_CENTER_CBCR_ID",                
            ], # 21* hospitals
            "vaccinator_name" => [
                'header' => 'VACCINATOR_NAME',
                'required' => true,
                'required_if' => null,
                'formatted' => false,
                'formats' => [],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "VACCINATOR_NAME is not defined",
                'message_formatted' => null,                
            ], # 22* dosages / vaccinator name
            "dose1" => [
                'header' => '1ST_DOSE',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => ["Y","N"],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "1ST_DOSE is not defined",
                'message_formatted' => "Invalid value for 1ST_DOSE",                
            ], # 23* dosages / first dose
            "dose2" => [
                'header' => '2ND_DOSE',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => ["Y","N"],
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "2ND_DOSE is not defined",
                'message_formatted' => "Invalid value for 2ND_DOSE",                   
            ], # 24* dosages / second dose
            "has_adverse_event" => [
                'header' => 'Adverse Event',
                'required' => true,
                'required_if' => null,
                'formatted' => true,
                'formats' => ["Y","N"],
                'default_no' => true,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "Adverse Event is not defined",
                'message_formatted' => "Invalid value for Adverse Event",                     
            ], # 25* aefis / adverse event
            "adverse_event_condition" => [
                'header' => 'Adverse Event Condition',
                'required' => false, # true if has_adverse_event is Y
                'required_if' => 'has_adverse_event',
                'formatted' => true,
                'formats' => $adverse_event_conditions->toArray(),
                'default_no' => false,
                'na_if_empty' => false,
                'none_if_empty' => false,
                'message' => "Adverse Event Condition is not defined",
                'message_formatted' => "Invalid value for Adverse Event Condition",                           
            ], # 26* aefis / adverse event condition            
        ];

        event(new ImportInoculationMonitor($id,['class'=>'info','text'=>"Reading rows..."]));        

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($file_path);

        $worksheet = $spreadsheet->getActiveSheet();

        $rows = [];
        foreach ($worksheet->getRowIterator() as $row) {

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE);

            $row = [];
            $empties = [];
            foreach ($cellIterator as $cell) {
                $value = trim($cell->getValue());
                $row[] = $value;
                $empties[] = $value == "";
            }

            // $this->dumpToSlack($empties,"empties");
            if (in_array(false,$empties)) $rows[] = $row;

        }

        $assocs = [];
        foreach ($rows as $i => $row) {

            if ($i == 0) continue;

            $cols = [];
            foreach($row as $key => $cell) {
                if (isset($properties[$key])) {
                    if ($properties[$key] == "birthdate") {
                        $birthdate = date("Y-m-d",PODate::excelToTimestamp(intval($cell)));
                        $cols[$properties[$key]] = ($birthdate=="1970-01-01")?"":$birthdate;
                    } else if ($properties[$key] == "date_of_vaccination") {
                        $date_of_vaccination = date("Y-m-d",PODate::excelToTimestamp(intval($cell)));
                        $cols[$properties[$key]] = ($date_of_vaccination=="1970-01-01")?"":$date_of_vaccination;
                    } else {
                        $cols[$properties[$key]] = $cell;
                    }
                }
            }

            $cols['valid'] = false;

            $assocs[] = $cols;
        }

        event(new ImportInoculationMonitor($id,['class'=>'info','text'=>"Validating data..."]));

        // $this->dumpToSlack($assocs[0],"ROWS");                    

        /**
         * Validate data
         */
        
        foreach ($assocs as $i => $row) {

            $valids = [true];

            $fullname = "{$row['first_name']} {$row['middle_name']} {$row['last_name']}";
            event(new ImportInoculationMonitor($id,['class'=>'info','text'=>"Validating {$fullname}'s info"]));

            foreach ($row as $p => $value) {

                if (isset($validations[$p])) {

                    $validation = $validations[$p];
                    $value = $row[$p];


                    // Check if napanam id exists
                    // Check if registration exists
                    if ($p=="qr_pass_id") {
                        if ($value!="") {
                            // $qr_pass = QrPass::find($value);
                            // if (is_null($qr_pass)) {
                            //     $valids[] = false;
                            //     event(new ImportInoculationMonitor($id,['class'=>'error','text'=>"{$fullname}'s NAPANAM ID doesn't exists"]));
                            // }
                            // $qr_pass_reg = Registration::where('qr_pass_id',$value)->first();
                            // if (is_null($qr_pass_reg)) {
                            //     $valids[] = false;
                            //     event(new ImportInoculationMonitor($id,['class'=>'error','text'=>"{$fullname}'s has no registration yet"]));
                            // }                            
                        }
                    }
                    //          

                    if ($value=="") {

                        if ($validation['default_no']) {
                            $assocs[$i][$p] = "N";
                        }

                        if ($validation['na_if_empty']) {
                            $assocs[$i][$p] = "NA";
                        }

                        if ($validation['none_if_empty']) {
                            $assocs[$i][$p] = "NONE";
                        }

                    }
                    
                    $value = $assocs[$i][$p];

                    if (!$validation['required']) {

                        if ((!$validation['formatted']) && ($validation['required_if']===null)) continue;

                        if (($validation['formatted']) && is_null($validation['required_if'])) {

                            if ($value!="") $valids[] = $this->validateFormat($id,$validation,$row,$p,$value);

                        }

                        if ($validation['required_if']!==null) {

                            if (($validation['required_if']=="deferral") && ($row['deferral']=="Y")) {

                                if ($value!="") $valids[] = $this->validateFormat($id,$validation,$row,$p,$value);

                            }

                            if (($validation['required_if']=="has_adverse_event") && ($row['has_adverse_event']=="Y")) {

                                if ($value!="") $valids[] = $this->validateFormat($id,$validation,$row,$p,$value);
                                
                            }
                            
                        }

                    } else {

                        if ($value=="") {

                            $valids[] = false;
                            event(new ImportInoculationMonitor($id,['class'=>'error','text'=>$validation['message']]));

                        }

                        if ($validation['formatted']) {

                            $valids[] = $this->validateFormat($id,$validation,$row,$p,$value);

                        }

                    }

                }

            }

            $is_valid = !in_array(false,$valids);
            if ($is_valid) {
                event(new ImportInoculationMonitor($id,['class'=>'success','text'=>"{$fullname}'s info is valid"]));
            } else {
                event(new ImportInoculationMonitor($id,['class'=>'error','text'=>"Please correct {$fullname}'s info"]));
            }
            $assocs[$i]['valid'] = $is_valid;

        }

        /**
         * Check if all validations has passed
         */
        $get_validations = collect($assocs)->pluck('valid')->toArray();
        $ok_for_import = !in_array(false,$get_validations);
        // $this->dumpToSlack($get_validations,"DEBUG");

        if (!$ok_for_import) {
            event(new ImportInoculationMonitor($id,['class'=>'info','text'=>"Please correct all the invalid information first, re-upload, then try importing again."]));
        } else {
            // Initiate import
            event(new ImportInoculationMonitor($id,['class'=>'info','text'=>"All patients info are valid"]));
            $this->import($id,$assocs);
        }

    }

    private function validateFormat($id,$validation,$row,$p,$value)
    {

        $valid = true;

        $formats = gettype($validation['formats'])==="object"?$validation['formats']->toArray():$validation['formats'];

        if ($p=="town_city") {
            $province = $row['province'];
            $provCode = substr($province,0,3);
            $town_cities = $this->provMunCityVasValue($provCode);
            $formats = gettype($town_cities)==="object"?$town_cities->toArray():$town_cities;
        }

        if (!in_array($value,$formats)) {
            $valid = false;
            event(new ImportInoculationMonitor($id,['class'=>'error','text'=>$validation['message_formatted']]));
        }

        return $valid;

    }

    private function import($id,$data)
    {
        event(new ImportInoculationMonitor($id,['class'=>'info','text'=>"Initiating import..."]));

        foreach ($data as $d) {

            /**
             * Registration
             * 
             * priority_group
             * qr_pass_id
             * pwd_id
             * indigenous_member
             * last_name
             * first_name
             * middle_name
             * suffix
             * contact_no
             * region
             * province
             * town_city
             * barangay
             * gender
             * birthdate
             */

            $genders = [
                "M" => "02_Male",
                "F" => "02_Female",
            ];

            $province = null;
            $_province = explode("0",$d['province']);
            $get_province = Province::where('provCode', $_province[0])->first();
            if (!is_null($get_province)) $province = $this->toDOHProv($get_province);

            $town_city = null;
            $_town_city = explode("0",$d['town_city']);
            $town_city_code = $_town_city[0];
            $get_town_city = CityMun::where('citymunCode', $town_city_code)->first();
            if (!is_null($get_town_city)) $town_city = $this->toDOHMun($get_town_city);

            $registration_data = [
                "priority_group" => $d['priority_group'],
                "qr_pass_id" => $d['qr_pass_id'],
                "pwd_id" => $d['pwd_id'],
                "indigenous_member" => $d['indigenous_member'],
                "last_name" => $d['last_name'],
                "first_name" => $d['first_name'],
                "middle_name" => $d['middle_name'],
                "suffix" => $d['suffix'],
                "contact_no" => $d['contact_no'],
                "region" => $d['region'],
                "province" => $province,
                "province_vas" => $d['province'],
                "town_city" => $town_city,
                "town_city_vas" => $d['town_city'],
                "town_city_code" => intval($town_city_code),
                "barangay" => null,
                "barangay_vas" => $d['barangay'],
                "gender" => $genders[$d['gender']],
                // "birthdate" => Carbon::parse($d['birthdate'])->format("Y-m-d"),
                // "birthdate" => date("Y-m-d",PODate::excelToTimestamp(intval($d['birthdate']))),
                "birthdate" => date("Y-m-d",strtotime($d['birthdate'])),
            ];
            $this->dumpToSlack($registration_data,"DEBUG");
            $check_registration = Registration::where('qr_pass_id',$d['qr_pass_id'])->first();
            if (is_null($check_registration)) {
                $registration = new Registration;
                $registration->fill($registration_data);
                $registration->save();
            } else {
                $registration = $check_registration;
            }

            /**
             * Vaccine
             * qr_pass_id
             */
            $check_vaccine = Vaccine::where('qr_pass_id',$d['qr_pass_id'])->first();
            if (is_null($check_vaccine)) {
                $vaccine = new Vaccine;
                $vaccine->fill([
                    "qr_pass_id" => $d['qr_pass_id']
                ]);
                $vaccine->save();
            } else {
                $vaccine = $check_vaccine;
            }

            /**
             * Dosage
             * vaccine_id
             * qr_pass_id
             * date_of_vaccination
             * brand_name
             * batch_number                      
             * lot_number
             * vaccinator_name
             * vaccination_facility | cbcr_id
             * dose
             */

            /**
             * PreAssessment
             * qr_pass_id
             * dosage_id
             * dose
             * consent 01_Yes | 02_No
             * reason
             * assessments
             */

            /**
             * PostAssessment
             * qr_pass_id
             * dosage_id
             * dose
             * assessments
             */

            /**
             * Aefi
             * qr_pass_id
             * dosage_id
             * dose
             * has_adverse_event
             * adverse_event_condition
             */

             break;

        }
    }
    
}
