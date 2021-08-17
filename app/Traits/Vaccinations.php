<?php

namespace App\Traits;

use App\Models\Registration;

trait Vaccinations {

    public function screened($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        $registration->screened = $value;
        $registration->save();

    }

    public function firstDoseScreened($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        $registration->first_dose_screened = $value;
        $registration->save();

    }

    public function secondDoseScreened($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        $registration->second_dose_screened = $value;
        $registration->save();

    }     

    public function firstDose($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();
        
        /**
         * Update:
         * first_dose
         * fully_vaccinated
         */
        $registration->first_dose = $value;
        $fully_vaccinated = $this->isFullyVaccinated($registration,$brand);
        $registration->fully_vaccinated = $fully_vaccinated;

        $vax_status = 1;
        if ($fully_vaccinated) $vax_status = 2;
        $qrpass = QrPass::find(intval($qr_pass_id));
        if (!is_null($qrpass)) {
            $qrpass->vax_status = $vax_status;
            $qrpass->save();
        }

        $registration->first_dose = $value;
        $registration->save();

    }

    public function secondDose($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        $registration->second_dose = $value;
        $fully_vaccinated = $this->isFullyVaccinated($registration,$brand);
        $registration->fully_vaccinated = $fully_vaccinated;

        $vax_status = 2;
        $qrpass = QrPass::find(intval($qr_pass_id));
        if (!is_null($qrpass)) {
            $qrpass->vax_status = $vax_status;
            $qrpass->save();
        }        

        $registration->save();

    }

    public function vaccinated($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        $registration->fully_vaccinated = $value;
        $registration->save();        

    }

    public function isFullyVaccinated($registration,$brand_name)
    {

        $brands = config('constants.brands');

        $vaccine = $registration->vaccine ?? null;
        $dosages = (is_null($vaccine)) ? null : $vaccine->dosages();        

        $fully_vaccinated = false;

        $doses = [];
        // first dose
        $first_dose = $registration->first_dose;
        $first_dosage = (is_null($dosages)) ? null : $dosages->where('dose', 1)->first();
        $brand_name = (is_null($first_dosage)) ? null : $first_dosage->brand_name;
        if ($first_dose) $doses[] = true;

        // second dose
        $second_dose = $registration->second_dose;
        if ($second_dose) $doses[] = true;        
        
        if ($brand_name!=null) {
            $get_brand = collect($brands)->where('id',$brand_name)->first();
            $brand_doses = $get_brand['dosages'];
            if (count($doses) >= $brand_doses) {
                $fully_vaccinated = true;
            }
        }

        return $fully_vaccinated;

    }

}