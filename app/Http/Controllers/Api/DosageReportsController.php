<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Messages;
use App\Traits\UserLocation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

use App\Models\Dosage;
use App\Models\Certificate;
use App\Http\Resources\DosageReportsResourceCollection;
use App\Http\Resources\RegistrationsCertificateListResourceCollection;
use App\Helpers\General\CollectionHelper;

use Carbon\Carbon;

class DosageReportsController extends Controller
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
        
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        
        $startFilter = Carbon::parse($start_date)->format("Y-m-d 00:00:00");
        $endFilter = Carbon::parse($end_date)->addDays(1)->format("Y-m-d 00:00:00");

        $search = (isset($request->search))?$request->search:null;

        $dosages = Dosage::join('registrations', 'registrations.qr_pass_id', '=', 'dosages.qr_pass_id')
            ->where($wheres)
            ->whereBetween('date_of_vaccination',[$startFilter,$endFilter])
            ->get(['dosages.qr_pass_id',
                    'dosages.id',
                    'dosages.brand_name',
                    'dosages.batch_number',
                    'dosages.user_id',
                    'dosages.lot_number',
                    'registrations.qr_pass_id',
                    'registrations.first_name', 
                    'registrations.last_name',
                ]);
        
        $dosages = $dosages->filter(function($dosage) use ($search) {
            $text = "{$dosage->qr_pass_id} {$dosage->first_name} {$dosage->last_name}";            
            $dosage->text = $text;
            if (is_null($search)) return true;
            $search = preg_replace('/[^A-Za-z0-9\s\-]/', '', $search);
            $pattern = "/".str_replace(" ","(.*)",$search)."/i";            
            return preg_match($pattern, $text);
        });
        
        $paginated = CollectionHelper::paginate($dosages, 10);

        $data = new DosageReportsResourceCollection($paginated);

        return $this->jsonSuccessResponse($data, 200);
    }

}
