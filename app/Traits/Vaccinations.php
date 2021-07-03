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

        $registration->first_dose = $value;
        $registration->save();

    }

    public function secondDose($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        $registration->second_dose = $value;
        $registration->save();

    }

    public function vaccinated($qr_pass_id,$value)
    {

        $registration = Registration::where('qr_pass_id', $qr_pass_id)->first();

        $registration->fully_vaccinated = $value;
        $registration->save();        

    }

}