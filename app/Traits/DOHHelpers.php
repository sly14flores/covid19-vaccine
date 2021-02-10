<?php

namespace App\Traits;

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

    public function toDOHMun($municipality)
    {
        $citymunDesc = ($municipality['citymunCode']==13314)?"CITY OF SAN FERNANDO":$municipality['citymunDesc'];
        $doh_municipality = "_0{$municipality['citymunCode']}_";
        $spaceWithUn = str_replace(' ','_',$citymunDesc);
        $spaceWithUn = str_replace('(','',$spaceWithUn);
        $spaceWithUn = str_replace(')','',$spaceWithUn);
        $spaceWithUn = str_replace(',','',$spaceWithUn);
        $spaceWithUn = str_replace('.','',$spaceWithUn);
        return $doh_municipality.$spaceWithUn;      
    }

    public function toDOHBrgy($barangay)
    {
        $doh_barangay = "_0{$barangay['brgyCode']}_";
        $spaceWithUn = str_replace(' ','_',$barangay['brgyDesc']);
        $spaceWithUn = str_replace('(','',$spaceWithUn);
        $spaceWithUn = str_replace(')','',$spaceWithUn);
        $spaceWithUn = str_replace(',','',$spaceWithUn);
        $spaceWithUn = str_replace('.','',$spaceWithUn);
        return strtoupper($doh_barangay.$spaceWithUn);
    }

    public function toDOHGender($gender)
    {
        $toDOH = "01_Femaile";
        if ($gender=="Male") {
            $toDOH = "02_Male";
        }

        return $toDOH;
    }

}