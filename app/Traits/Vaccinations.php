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

    public function firstDose($qr_pass_id,$brand,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();
        
        /**
         * Update:
         * first_dose
         * fully_vaccinated
         */
        $registration->first_dose = $value;
        $registration->fully_vaccinated = $this->isFullyVaccinated($brand);

        $registration->save();

    }

    public function secondDose($qr_pass_id,$brand,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        /**
         * Update:
         * second_dose
         * fully_vaccinated
         */
        $registration->second_dose = $value;
        $registration->fully_vaccinated = $this->isFullyVaccinated($brand);

        $registration->save();

    }

    public function vaccinated($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        $registration->fully_vaccinated = $value;
        $registration->save();        

    }

    public function isFullyVaccinated($brand_doses)
    {

        $brands = config('constants.brands');

        $fully_vaccinated = false;
        
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