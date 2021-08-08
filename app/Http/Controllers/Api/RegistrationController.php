<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Messages;
use App\Traits\UserLocation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

use Carbon\Carbon;

use App\Models\Registration;
use App\Http\Resources\RegistrationResource;
use App\Http\Resources\RegistrationResourceCollection;
use App\Http\Resources\RegistrationsListResourceCollection;
use App\Helpers\General\CollectionHelper;

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
    public function index(Request $request)
    {
        $wheres = [];

        if (self::userNotAdmin()) {
            $location = self::userLocation();
            $wheres[] = ['town_city_code',$location];
        }

        $town_city = $request->town_city;
        $origin = $request->origin;
        
        $townCityCode = null;
        if (isset($town_city)) {
            if ($town_city!="all") {
                $tc = explode("_",$town_city);
                $townCityCode = $tc[1];
                $wheres[] = ['town_city_code',$townCityCode];
            }
        }

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        
        $startFilter = Carbon::parse($start_date)->format("Y-m-d 00:00:00");
        $endFilter = Carbon::parse($end_date)->addDays(1)->format("Y-m-d 00:00:00");

        $search = (isset($request->search))?$request->search:null;
        
        if($origin=="all") {
            $origin = '<>';
        }

        $registrations = Registration::where($wheres)->where('origin', $origin,'')->whereBetween('created_at',[$startFilter,$endFilter])->get();
        
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
            'category' => 'string',
            'category_id' => 'string',
            'category_id_no' => 'string',
            'philhealth' => 'string',
            'pwd_id' => 'string',
            'indigenous_member' => 'string',
            'civil_status' => 'string',
            'priority_group' => 'string',
            'sub_priority_group' => 'string',
            'occupation' => 'string',
            'with_allergy' => 'string',
            'with_comorbidity' => 'string',   
            'is_registered' => 'string',
            'origin' => 'string',
            'employer_name' => 'string',
            'employer_address' => 'string',
            'employer_lgu' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);

        /** Get validated data */
        $data = $validator->valid();

        $tc = $data['town_city'] ?? explode("_",$data['town_city']);
        $data['town_city_code'] = $tc[1] ?? null;

        try {

            $registration = new Registration;
            $registration->fill($data);

            $registration->save();

            $data = new RegistrationResource($registration);

            return $this->jsonSuccessResponse($data, 200);             

        } catch (\Exception $e) {

            if ($e instanceof QueryException) {
                if ($e->getCode()!=="23000") {
                    report($e);
                    return $this->jsonFailedResponse(null, 406, $e->getMessage());
                }
                return $this->jsonFailedResponse(null, 500, $e->getMessage());
            } else {
                report($e);
                return $this->jsonFailedResponse(null, 500, $e->getMessage());
            }

        }
   
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
            'category' => 'string',
            'category_id' => 'string',
            'category_id_no' => 'string',
            'philhealth' => 'string',
            'pwd_id' => 'string',
            'indigenous_member' => 'string',
            'priority_group' => 'string',
            'sub_priority_group' => 'string',
            'occupation' => 'string',
            'with_allergy' => 'string',
            'with_comorbidity' => 'string',
            'is_registered' => 'string',
            'origin' => 'string',
            'employer_name' => 'string',
            'employer_address' => 'string',
            'employer_lgu' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);        

        /** Get validated data */
        $data = $validator->valid();     
        unset($data['id']);

        $tc = explode("_",$data['town_city']);
        $data['town_city_code'] = $tc[1] ?? null;

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
