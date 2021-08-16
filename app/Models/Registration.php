<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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
        'barangay_vas', #
        'town_city', #
        'town_city_vas', #
        'town_city_code', #
        'province', #
        'province_vas', #
        'contact_no', #
        'category', #
        'category_id', #
        'category_id_no', #
        'philhealth', #
        'pwd_id', #
        'priority_group', #
        'sub_priority_group', #
        'occupation', #
        'with_allergy', #
        'allergic_to_vaccines', #
        'with_comorbidity', #
        'is_registered', #
        'origin', #
        'indigenous_member', #
        'employer_name', #
        'employer_address', #
        'employer_lgu', #
        'screened',
        'first_dose_screened',
        'second_dose_screened',
        'first_dose',
        'second_dose',
        'fully_vaccinated',
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
        'birthdate' => 'date',
        'screened' => 'boolean',
        'first_dose_screened' => 'boolean',
        'second_dose_screened' => 'boolean',
        'first_dose' => 'boolean',
        'second_dose' => 'boolean',
        'fully_vaccinated' => 'boolean',
    ];

    public function townCity()
    {
        return $this->belongsTo(CityMun::class, 'town_city_code', 'citymunCode');

    }

    public function vaccine()
    {
        return $this->hasOne(Vaccine::class, 'qr_pass_id', 'qr_pass_id');
    }

    public function dosages()
    {
        return $this->hasManyThrough(
            Dosage::class,
            Vaccine::class,
            'qr_pass_id',
            'vaccine_id',
            'qr_pass_id',
            'id',
        );
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function scopeScreened($query)
    {
        return $query->where('screened', 1);
    }

    public function scopeNotScreened($query)
    {
        return $query->where('screened', 0);
    }

    public function scopeFirstDoseScreened($query)
    {
        return $query->where('first_dose_screened', 1);
    }

    public function scopeNotFirstDoseScreened($query)
    {
        return $query->where('first_dose_screened', 0);
    } 

    public function scopeSecondDoseScreened($query)
    {
        return $query->where('second_dose_screened', 1);
    }

    public function scopeNotSecondDoseScreened($query)
    {
        return $query->where('second_dose_screened', 0);
    }
    
    public function scopeOrNotSecondDoseScreened($query)
    {
        return $query->orWhere('second_dose_screened', 0);
    }

    public function scopeFirstDose($query)
    {
        return $query->where('first_dose', 1);
    }

    public function scopeOrFirstDose($query)
    {
        return $query->orWhere('first_dose', 1);
    }

    public function scopeSecondDose($query)
    {
        return $query->where('second_dose', 1);
    }

    public function scopeOrSecondDose($query)
    {
        return $query->orWhere('second_dose', 1);
    }    

    public function scopeFullyVaccinated($query)
    {
        return $query->where('fully_vaccinated', 1);
    }

}
