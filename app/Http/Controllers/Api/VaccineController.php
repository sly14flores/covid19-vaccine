<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Registration;
use App\Models\Vaccine;
use App\Models\Dosage;
use App\Models\PreAssessment;
use App\Models\PostAssessment;
use App\Models\Barangay;
use App\Models\CityMun;
use App\Models\Province;
use App\Models\QrPass;

use App\Http\Resources\VaccineResource;
use App\Http\Resources\VaccineResourceCollection;
use App\Http\Resources\VaccinesListResourceCollection;
use App\Http\Resources\RegistrationVaccineResource;
use App\Http\Resources\RegistrationsListResourceCollection;

use App\Traits\Messages;
use App\Traits\DOHHelpers;
use App\Traits\SelectionsRegistration;
use App\Helpers\General\CollectionHelper;

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
     * List for vaccination
     * 
     * Search registrations by QR, first name, middle name, last name for vaccinations
     */
    public function searchRegistrations(Request $request)
    {
        $search = (isset($request->search))?$request->search:null;

        $registrations = Registration::all();

        $registrations = $registrations->filter(function($registration) use ($search) {
            $text = "{$registration->qr_pass_id} {$registration->first_name}, {$registration->middle_name}, {$registration->last_name}";            
            $registration->text = $text;
            if (is_null($search)) return true;
            $search = preg_replace('/[^A-Za-z0-9\-]/', '', $search);
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

        $vaccine = Vaccine::where('qr_pass_id',$id)->first();

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new VaccineResource($vaccine);

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
        // return $request->all();
        $vaccine = Vaccine::where('qr_pass_id',$id)->first();

        if (is_null($vaccine)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'facility_others' => 'string',
            'vaccination_session' => 'integer',
            'dosages' => 'array',
            'delete' => 'array'
        ];

        $validator = Validator::make($request->all(), $rules);

        /** Get validated data */
        $data = $validator->valid();

        $dosages = (isset($data['dosages']))?$data['dosages']:[];

        foreach ($dosages as $dosage) {
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
            // 'category' => 'string',
            // 'category_id' => 'string',
            // 'category_id_no' => 'string',
            // 'philhealth' => 'string',
            // 'pwd_id' => 'string',
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
}
