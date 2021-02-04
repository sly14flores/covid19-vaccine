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
        'qr_pass_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'birthdate',
        'gender',
        'address',
        'barangay',
        'town_city',
        'province',
        'contact_no',
        'civil_status',
        'category',
        'category_id',
        'category_id_no',
        'employment_status',
        'profession',
        'philhealth',
        'employer_name',
        'employer_address',
        'employer_lgu',
        'employer_contact_no',
        'pregnancy_status',
        'with_allergy',
        'allergy',
        'with_allergy_others',
        'with_comorbidity',
        'comorbidity',
        'with_comorbidity_others',
        'diagnosed',
        'covid_classification',
        'diagnosed_date',
        'consent_vaccination',
    ];

    protected $hidden = [
        'updated_at',
    ];

    protected $casts = [
        'pregnancy_status' => 'boolean',
        'with_allergy' => 'boolean',
        'with_comorbidity' => 'boolean',
        'diagnosed' => 'boolean',
        'consent_vaccination' => 'boolean',
        'diagnosed_date' => 'date',
    ];

}
