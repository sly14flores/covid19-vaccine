<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qr_pass_id', #
        'first_name', #
        'middle_name', #
        'last_name', #
        'suffix', #
        'birthdate', #
        'gender', #
        'region', #
        'address', #
        'barangay', #
        'town_city', #
        'province', #
        'contact_no', #
        'priority_group', #
        'sub_priority_group', #
        'occupation', #
        'with_allergy', #
        'allergic_to_vaccines', #
        'with_comorbidity', #
        'is_registered', #
        'origin', #
    ];

    // protected $fillable = [
    //     'qr_pass_id',
    //     'first_name', #
    //     'middle_name', #
    //     'last_name', #
    //     'suffix', #
    //     'birthdate', #
    //     'gender', #
    //     'region', #
    //     // 'address',
    //     'barangay', #
    //     'town_city', #
    //     'province', #
    //     'contact_no', #
    //     // 'civil_status',
    //     'priority_group', #
    //     'sub_priority_group', #
    //     // 'category',
    //     // 'category_id',
    //     // 'category_id_no',
    //     // 'employment_status',
    //     // 'profession',
    //     'occupation', #
    //     // 'philhealth',
    //     // 'pwd_id',
    //     // 'employer_name',
    //     // 'employer_address',
    //     // 'employer_lgu',
    //     // 'employer_municipality',
    //     // 'employer_contact_no',
    //     // 'direct_interaction',
    //     // 'pregnancy_status',
    //     // 'drug_allergy',
    //     // 'food_allergy',
    //     // 'insect_allergy',
    //     // 'latex_allergy',
    //     // 'mold_allergy',
    //     // 'pet_allergy',
    //     // 'pollen_allergy',
    //     // 'with_allergy',
    //     // 'allergy',
    //     // 'with_allergy_others',
    //     // 'hypertension',
    //     // 'heart_disease',
    //     // 'kidney_disease',
    //     // 'diabetes_mellitus',
    //     // 'bronchial_asthma',
    //     // 'immuno_deficiency_status',
    //     // 'cancer',
    //     // 'comorbidity_others',
    //     'with_comorbidity', #
    //     // 'comorbidity',
    //     // 'with_comorbidity_others',
    //     // 'diagnosed',
    //     // 'covid_classification',
    //     // 'diagnosed_date',
    //     // 'consent_vaccination',
    //     'allergic_to_vaccines', #
    // ];    

    protected $hidden = [
        'updated_at',
    ];

    protected $casts = [
        'diagnosed_date' => 'date',
    ];

    public function vaccine()
    {
        return $this->hasOne(Vaccine::class, 'qr_pass_id', 'qr_pass_id');
    }

}
