<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\Messages;
use Illuminate\Support\Facades\DB;
use App\Models\QrPass;
use App\Models\Survey;
use App\Models\Registration;

use App\Http\Resources\QrPassResource;
use App\Http\Resources\QrPassResourceDOH;

class NapanamController extends Controller
{

    use Messages;

    public function checkRegistration($id)
    {

        $napanam = $this->checkConnection();

        if ($napanam===false) {

            return $this->jsonFailedResponse(null, 500, "Cannot connect to napanam database");

        }

        $qrpass = QrPass::find($id);

        if (is_null($qrpass)) {
			return $this->jsonErrorResourceNotFound();
        }

        $survey = Survey::where('qr_pass_id',$id)->get();
        if (count($survey)) {
            return $this->jsonSuccessResponse(null, 406, "Already registered");
        }

        $data = new QrPassResource($qrpass);
        return $this->jsonSuccessResponse($data, 200);

    }

    public function verifyNapanamQR($id,$birthday)
    {

        $napanam = $this->checkConnection();

        if ($napanam===false) {

            return $this->jsonFailedResponse(null, 500, "Cannot connect to napanam database");

        }

        $qrpass = QrPass::where([['id',intval($id)],['dob',$birthday]])->first();

        if (is_null($qrpass)) {
			return $this->jsonErrorResourceNotFound();
        }

        $registration = Registration::where('qr_pass_id',$id)->get();
        if (count($registration)) {
            return $this->jsonSuccessResponse(null, 406, "Already registered");
        }        

        $data = new QrPassResourceDOH($qrpass);
        return $this->jsonSuccessResponse($data, 200);

    }

    public function getNapanamIDNO($id)
    {

        $napanam = $this->checkConnection();

        if ($napanam===false) {

            return $this->jsonFailedResponse(null, 500, "Cannot connect to napanam database");

        }

        $qrpass = QrPass::where([['id',intval($id)]])->first();

        if (is_null($qrpass)) {
			return $this->jsonErrorResourceNotFound();
        }

        $registration = Registration::where('qr_pass_id',$id)->get();
        if (count($registration)) {
            return $this->jsonSuccessResponse(null, 406, "Already registered");
        }        

        $data = new QrPassResourceDOH($qrpass);
        return $this->jsonSuccessResponse($data, 200);

    }

    private function checkConnection()
    {
        try {
            $napanam = DB::connection('napanam');
            return $napanam;         
        } catch (\Exception $e) {
            return false;
        }
    }
}
