<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Messages;
use App\Traits\UserLocation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

use App\Models\Certificate;
use App\Http\Resources\RegistrationCertificateResource;
use App\Http\Resources\RegistrationCertificateResourceCollection;
use App\Http\Resources\RegistrationsCertificateListResourceCollection;
use App\Helpers\General\CollectionHelper;

class VaccinationCertificateController extends Controller
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

        $search = (isset($request->search))?$request->search:null;
        
        $registrations = Certificate::where($wheres)->get();
        
        $registrations = $registrations->filter(function($registration) use ($search) {
            $text = "{$registration->qr_pass_id} {$registration->first_name}, {$registration->middle_name}, {$registration->last_name}";            
            $registration->text = $text;
            if (is_null($search)) return true;
            $search = preg_replace('/[^A-Za-z0-9\s\-]/', '', $search);
            $pattern = "/".str_replace(" ","(.*)",$search)."/i";            
            return preg_match($pattern, $text);
        });

        $paginated = CollectionHelper::paginate($registrations, 10);

        $data = new RegistrationsCertificateListResourceCollection($paginated);

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

        $registration = Certificate::find($id);

        

        if (is_null($registration)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new RegistrationCertificateResource($registration);

        return $this->jsonSuccessResponse($data, 200);
    }

}
