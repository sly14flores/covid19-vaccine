<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\Messages;
use Illuminate\Support\Facades\DB;

use App\Models\Profile;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{

    use Messages;

    public function verifyRegistrationQr($id,$birthday)
    {

        $profile = Profile::where([['qr_pass_id',intval($id)],['birthdate',$birthday]])->first();
        if (is_null($profile)) {
			return $this->jsonErrorResourceNotFound();
        }

        $data = new ProfileResource($profile);
        return $this->jsonSuccessResponse($data, 200);

    }

}
