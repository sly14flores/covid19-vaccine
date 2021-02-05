<?php

namespace App\Traits;

trait SelectionsRegistration
{

    public function civilStatusValue()
    {
        return [
            ["name"=>"Single", "id"=>1],
            ["name"=>"Married", "id"=>2],
            ["name"=>"Widow/Widower", "id"=>3],
            ["name"=>"Separated/Annulled", "id"=>4],
            ["name"=>"Living with Partner", "id"=>5]
        ];
    }

    public function categoryValue()
    {
        return [
            ["name"=>"Health Care Worker", "id"=>1],
            ["name"=>"Senior Citizen", "id"=>2],
            ["name"=>"Indigent", "id"=>3],
            ["name"=>"Uniformed Personnel", "id"=>4],
            ["name"=>"Essential Worker", "id"=>5],
            ["name"=>"Other", "id"=>6]
        ];
    }

    public function categoryIdValue()
    {
        return [
            ["name"=>"PRC number", "id"=>1],
            ["name"=>"OSCA number", "id"=>2],
            ["name"=>"Facility ID number", "id"=>3],
            ["name"=>"PWD ID", "id"=>4],
            ["name"=>"Other ID", "id"=>5]
        ];
    }

    public function employmentStatusValue()
    {
        return [
            ["name"=>"Government Employed", "id"=>1],
            ["name"=>"Private Employed", "id"=>2],
            ["name"=>"Self-employed", "id"=>3],
            ["name"=>"Private", "id"=>4]
        ];
    }

    public function professionValue()
    {
        return [
            ["name"=>"Dental Hygienist", "id"=>1],
            ["name"=>"Private Employed", "id"=>2],
            ["name"=>"Dentist", "id"=>3],
            ["name"=>"Medical Technologist", "id"=>4],
            ["name"=>"Midwife", "id"=>5],
            ["name"=>"Nurse", "id"=>6],
            ["name"=>"Nutritionist-Dietician", "id"=>7],
            ["name"=>"Occupational Therapist", "id"=>8],
            ["name"=>"Optometrist", "id"=>9],
            ["name"=>"Pharmacist", "id"=>10],
            ["name"=>"Physical Therapist", "id"=>11],
            ["name"=>"Physician", "id"=>12],
            ["name"=>"Radiologic Technologist", "id"=>13],
            ["name"=>"Respiratory Therapist", "id"=>14],
            ["name"=>"X-ray Technologist", "id"=>15],
            ["name"=>"Barangay Health Worker", "id"=>16],
        ];
    }

    public function allergyValue()
    {
        return [
            ["name"=>"Drug", "id"=>1],
            ["name"=>"Food", "id"=>2],
            ["name"=>"Insect", "id"=>3],
            ["name"=>"Latex", "id"=>4],
            ["name"=>"Mold", "id"=>5],
            ["name"=>"Pet", "id"=>6],
            ["name"=>"Pollen", "id"=>7]
        ];
    }

    public function comorbidityValue()
    {
        return [
            ["name"=>"Hypertension", "id"=>1],
            ["name"=>"Heart disease", "id"=>2],
            ["name"=>"Kidney disease", "id"=>3],
            ["name"=>"Diabetes mellitus", "id"=>4],
            ["name"=>"Bronchial Asthma", "id"=>5],
            ["name"=>"Immunodeficiency state", "id"=>6],
            ["name"=>"Cancer", "id"=>7],
        ];
    }

    public function covidClassificationValue()
    {
        return [
            ["name"=>"Asymptomatic", "id"=>1],
            ["name"=>"Mild", "id"=>2],
            ["name"=>"Moderate", "id"=>3],
            ["name"=>"Severe", "id"=>4],
            ["name"=>"Critical", "id"=>5],
        ];        
    }

    public function employerLguValue()
    {
        return [
            ["name"=>"Component City", "id"=>1],
            ["name"=>"Municipality", "id"=>2],
        ];
    }

    public function monthValue()
    {
        return [
            ["name"=>"January", "id"=>"01"],
            ["name"=>"February", "id"=>"02"],
            ["name"=>"March", "id"=>"03"],
            ["name"=>"April", "id"=>"04"],
            ["name"=>"May", "id"=>"05"],
            ["name"=>"June", "id"=>"06"],
            ["name"=>"July", "id"=>"07"],
            ["name"=>"August", "id"=>"08"],
            ["name"=>"September", "id"=>"09"],
            ["name"=>"October", "id"=>"10"],
            ["name"=>"November", "id"=>"11"],
            ["name"=>"December", "id"=>"12"],
        ];
    }

    public function dayValue()
    {
        return [
            ["name"=>"01", "id"=>"01"],
            ["name"=>"02", "id"=>"02"],
            ["name"=>"03", "id"=>"03"],
            ["name"=>"04", "id"=>"04"],
            ["name"=>"05", "id"=>"05"],
            ["name"=>"06", "id"=>"06"],
            ["name"=>"07", "id"=>"07"],
            ["name"=>"08", "id"=>"08"],
            ["name"=>"09", "id"=>"09"],
            ["name"=>"10", "id"=>"10"],
            ["name"=>"11", "id"=>"11"],
            ["name"=>"12", "id"=>"12"],
            ["name"=>"13", "id"=>"13"],
            ["name"=>"14", "id"=>"14"],
            ["name"=>"15", "id"=>"15"],
            ["name"=>"16", "id"=>"16"],
            ["name"=>"17", "id"=>"17"],
            ["name"=>"18", "id"=>"18"],
            ["name"=>"19", "id"=>"19"],
            ["name"=>"20", "id"=>"20"],
            ["name"=>"21", "id"=>"21"],
            ["name"=>"22", "id"=>"22"],
            ["name"=>"23", "id"=>"23"],
            ["name"=>"24", "id"=>"24"],
            ["name"=>"25", "id"=>"25"],
            ["name"=>"26", "id"=>"26"],
            ["name"=>"27", "id"=>"27"],
            ["name"=>"28", "id"=>"28"],
            ["name"=>"29", "id"=>"29"],
            ["name"=>"30", "id"=>"30"],
            ["name"=>"31", "id"=>"31"],
        ];
    }

}