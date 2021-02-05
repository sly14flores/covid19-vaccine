<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\Messages;
use App\Traits\SelectionsRegistration;

class DOHDataSelections extends Controller
{

    use Messages, SelectionsRegistration;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $selections = [
            "civil_status_value" => $this->civilStatusValue(),
            "category_value" => $this->categoryValue(),
            "category_id_value" => $this->categoryIdValue(),
            "employment_status_value" => $this->employmentStatusValue(),
            "profession_value" => $this->professionValue(),
            "allergy_value" => $this->allergyValue(),
            "comorbidity_value" => $this->comorbidityValue(),
            "covid_classification_value" => $this->covidClassificationValue(),
            "employer_lgu_value" => $this->employerLguValue(),
            "month_value" => $this->monthValue(),
            "day_value" => $this->dayValue(),
        ];

        return $this->jsonSuccessResponse($selections, 200);
    }
}
