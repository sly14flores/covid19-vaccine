<?php

namespace App\Traits;

trait SelectionsRegistration
{

    public function civitStatusValue()
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

}