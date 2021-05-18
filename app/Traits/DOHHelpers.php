<?php

namespace App\Traits;

use App\Models\Barangay;
use App\Models\CityMun;
use App\Models\Province;

use Carbon\Carbon;

trait DOHHelpers
{

    public function toDOHProv($province)
    {
        $doh_prov = "_0{$province['provCode']}_";
        $spaceWithUn = str_replace(' ','_',$province['provDesc']);
        $spaceWithUn = str_replace('(','',$spaceWithUn);
        $spaceWithUn = str_replace(')','',$spaceWithUn);
        $spaceWithUn = str_replace(',','',$spaceWithUn);
        $spaceWithUn = str_replace('.','',$spaceWithUn);
        return $doh_prov.$spaceWithUn;
    }

    public function dohToProv($doh_code)
    {
        $doh_code_exploded = explode("_",$doh_code);
        $code = intval($doh_code_exploded[1]);        

        return $code;

    }

    public function dohToProvDesc($doh_code)
    {
        $doh_code_exploded = explode("_",$doh_code);
        $code = intval($doh_code_exploded[1]);        

        $province = Province::where('provCode',$code)->first();
        return $province->provDesc;
    }    

    public function toDOHMun($municipality)
    {
        $citymunDesc = ($municipality['citymunCode']==13314)?"CITY OF SAN FERNANDO":$municipality['citymunDesc'];
        $doh_municipality = "_{$municipality['citymunCode']}_";
        $spaceWithUn = str_replace(' ','_',$citymunDesc);
        $spaceWithUn = str_replace('(','',$spaceWithUn);
        $spaceWithUn = str_replace(')','',$spaceWithUn);
        $spaceWithUn = str_replace(',','',$spaceWithUn);
        $spaceWithUn = str_replace('.','',$spaceWithUn);
        return $doh_municipality.$spaceWithUn;      
    }

    public function dohToMun($doh_code)
    {
        $doh_code_exploded = explode("_",$doh_code);
        $code = intval($doh_code_exploded[1]);
        
        return $code;
        // $city_mun = CityMun::where('citymunCode',$code)->first();
        // return $city_mun->citymunDesc;
    }

    public function dohToMunDesc($doh_code)
    {
        $doh_code_exploded = explode("_",$doh_code);
        $code = intval($doh_code_exploded[1]);
        
        $city_mun = CityMun::where('citymunCode',$code)->first();
        return $city_mun->citymunDesc;
    }

    public function toDOHBrgy($barangay)
    {
        $doh_barangay = "_{$barangay['brgyCode']}_";
        $spaceWithUn = str_replace(' ','_',$barangay['brgyDesc']);
        $spaceWithUn = str_replace('-','_',$spaceWithUn);
        // $spaceWithUn = str_replace('(','',$spaceWithUn);
        // $spaceWithUn = str_replace(')','',$spaceWithUn);
        // $spaceWithUn = str_replace(',','',$spaceWithUn);
        // $spaceWithUn = str_replace('.','',$spaceWithUn);
        return strtoupper($doh_barangay.$spaceWithUn);
    }

    public function dohToBrgy($doh_code)
    {
        $doh_code_exploded = explode("_",$doh_code);
        $code = intval($doh_code_exploded[1]);

        return $code;
        // $barangay = Barangay::where('brgyCode',$code)->first();
        // return $barangay->brgyDesc;
    }

    public function dohToBrgyDesc($doh_code)
    {
        $doh_code_exploded = explode("_",$doh_code);
        $code = intval($doh_code_exploded[1]);

        $barangay = Barangay::where('brgyCode',$code)->first();
        return $barangay->brgyDesc;
    }    

    public function toDOHGender($gender)
    {
        $toDOH = "01_Female";
        if ($gender=="Male") {
            $toDOH = "02_Male";
        }

        return $toDOH;
    }

    public function dohToGender($doh)
    {
        $genders = $this->genderValue();

        $gender = collect($genders)->filter(function($gender) use ($doh) {
            return $gender['id'] == $doh;
        });

        return ($gender->first())['name'];
    }

    public function computeAge($dob)
    {
        $thisYear = Carbon::parse($dob);
        $thisYear->setYear(now()->format("Y"));

        $birthday = Carbon::parse($dob)->diff($thisYear);

        return $birthday->format("%y");
    }

}