<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\Messages;

use App\Models\Hospital;

class GeneralDataSelections extends Controller
{

    use Messages;

    /**
     * Hospital selection
     */
    public function hospitals()
    {
        $hospitals = hospital::select(['id','description'])->get();

        return $this->jsonSuccessResponse($hospitals, 200);
    }

}
