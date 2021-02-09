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
        return $doh_prov.$spaceWithUn;
    }

    public function toDOHMun($municipality)
    {
        $doh_municipality = "_0{$municipality['citymunCode']}_";
        $spaceWithUn = str_replace(' ','_',$municipality['citymunDesc']);
        $spaceWithUn = str_replace('(','',$spaceWithUn);
        $spaceWithUn = str_replace(')','',$spaceWithUn);
        $spaceWithUn = str_replace(',','',$spaceWithUn);
        return $doh_municipality.$spaceWithUn;      
    }

    public function toDOHBrgy($barangay)
    {
        $doh_barangay = "_0{$barangay['brgyCode']}_";
        $spaceWithUn = str_replace(' ','_',$barangay['brgyDesc']);
        $spaceWithUn = str_replace('(','',$spaceWithUn);
        $spaceWithUn = str_replace(')','',$spaceWithUn);
        $spaceWithUn = str_replace(',','',$spaceWithUn);
        return $doh_barangay.$spaceWithUn;  
    }

}