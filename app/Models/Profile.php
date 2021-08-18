<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Traits\SelectionsRegistration;

class Profile extends Model
{
    use HasFactory, SelectionsRegistration;

    protected $table = 'registrations';

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
        return Carbon::parse($value)->format('F j, Y');
    }
    public function priority($priority_group)
    {
        $groups = $this->priorityGroupValue();

        $group = collect($groups)->where('id',$priority_group)->first();

        return $group['description'] ?? "";
    }
}
