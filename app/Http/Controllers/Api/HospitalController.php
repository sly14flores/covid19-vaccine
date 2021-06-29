<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hospital;
use App\Http\Resources\HospitalResource;
use App\Http\Resources\HospitalResourceCollection;
use App\Http\Resources\HospitalListResource;
use App\Http\Resources\HospitalsListResourceCollection;

use Illuminate\Support\Facades\Validator;
use App\Traits\Messages;
use App\Helpers\General\CollectionHelper;

class HospitalController extends Controller
{
    use Messages;

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
     * 
     * @queryParam search string
     */
    public function index(Request $request)
    {
        $search = (isset($request->search))?$request->search:null;

        $hospitals = Hospital::all();

        $hospitals = $hospitals->filter(function($hospital) use ($search) {
            $text = "{$hospital->description} {$hospital->cbcr_id}";            
            $hospital->text = $text;
            if (is_null($search)) return true;
            $search = preg_replace('/[^A-Za-z0-9\s\-]/', '', $search);
            $pattern = "/".str_replace(" ","(.*)",$search)."/i";            
            return preg_match($pattern, $text);
        });

        $paginated = CollectionHelper::paginate($hospitals, 10);

        $data = new HospitalsListResourceCollection($paginated);
        
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
            'description' => 'string',
            'slots' => 'integer',
            'cbcr_id' => 'string'
        ];

        $validator = Validator::make($request->all(), $rules);

        /** Get validated data */
        $data = $validator->valid();

        $hospital = new Hospital;
        $hospital->fill($data);

        $hospital->save();

        $data = new HospitalResource($hospital);

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

        $hospital = Hospital::find($id);        

        if (is_null($hospital)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new HospitalResource($hospital);

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

        $hospital = Hospital::find($id);      

        if (is_null($hospital)) {
			return $this->jsonErrorResourceNotFound();
        }

        $rules = [
            'description' => 'string',
            'slots' => 'integer',
            'cbcr_id' => 'string'
        ];

        $validator = Validator::make($request->all(), $rules);        

        /** Get validated data */
        $data = $validator->valid();        
        unset($data['id']);

        $hospital->fill($data);

        $hospital->save();

        $data = new HospitalResource($hospital);

        return $this->jsonSuccessResponse($data, 200, 'Hospital info updated successfully'); 
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

        $hospital = Hospital::find($id);        

        if (is_null($hospital)) {
			return $this->jsonErrorResourceNotFound();
        }        

        $hospital->delete();

        return $this->jsonDeleteSuccessResponse();
    }
}
