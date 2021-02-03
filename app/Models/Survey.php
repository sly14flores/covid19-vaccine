<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Survey extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qr_pass_id',
        'last_name',
        'first_name',
        'middle_name',
        'birthdate',
        'gender',
        'province',
        'town_city',
        'barangay',
        'frontline_health_workers',
        'senior_citizens',
        'uniformed_personnel',
        'teachers',
        'social_workers',
        'government_employees',
        'agriculture_group',
        'food_industry',
        'tranportation',
        'tourism',
        'persons_deprived_of_liberty',
        'persons_with_disability',
        'ofw',
        'others_population_group',
        'population_group_other',
        'lung_disease',
		'heart_disease',
        'kidney_disease',
        'diabetes',
        'high_blood_pressure',
        'cancer',
        'leukemia',
        'hiv',
        'mental_problem',
        'others_health_condition',
        'health_condition_other',
        'none_of_the_above',
        'yes_currently_pregnant',
        'no_currently_pregnant',
        'not_sure_currently_pregnant',
        'yes_pregnant_baby',
        'no_pregnant_baby',
        'yes_vaccine',
        'no_vaccine',
        'yes_contribute',
        'no_contribute',
        'efficacy_rate_reason',
        'safety_reason',
        'presence_reason',
        'brand_reason',
        'pregnant_reason',
        'lack_of_information_reason',
        'others_reason',
        'reason_other',
        'one_hundred_percent_fee',
        'seventy_five_percent_fee',
        'fifty_percent_fee',
        'twenty_five_percent_fee',
        'none_fee',
    ];
    
    protected $hidden = [
        'updated_at',
    ];

    protected $casts = [
		'frontline_health_workers' => 'boolean',
		'senior_citizens' => 'boolean',
		'uniformed_personnel' => 'boolean',
		'teachers' => 'boolean',
		'social_workers' => 'boolean',
		'government_employees' => 'boolean',
		'agriculture_group' => 'boolean',
		'food_industry' => 'boolean',
		'tranportation' => 'boolean',
		'tourism' => 'boolean',
		'persons_deprived_of_liberty' => 'boolean',
		'persons_with_disability' => 'boolean',
        'ofw' => 'boolean',
        'others_population_group' => 'boolean',
		'lung_disease' => 'boolean',
		'heart_disease' => 'boolean',
		'kidney_disease' => 'boolean',
		'diabetes' => 'boolean',
		'high_blood_pressure' => 'boolean',
		'cancer' => 'boolean',
		'leukemia' => 'boolean',
		'hiv' => 'boolean',
		'mental_problem' => 'boolean',
        'none_of_the_above' => 'boolean',
        'yes_currently_pregnant' => 'boolean',
        'no_currently_pregnant' => 'boolean',
        'not_sure_currently_pregnant' => 'boolean',
		'yes_pregnant_baby' => 'boolean',
		'no_pregnant_baby' => 'boolean',
		'yes_vaccine' => 'boolean',
		'no_vaccine' => 'boolean',
		'yes_contribute' => 'boolean',
		'no_contribute' => 'boolean',
        'efficacy_rate_reason' => 'boolean',
        'safety_reason' => 'boolean',
        'presence_reason' => 'boolean',
        'brand_reason' => 'boolean',
        'pregnant_reason' => 'boolean',        
        'lack_of_information_reason' => 'boolean',
        'others_reason' => 'boolean',
		'one_hundred_percent_fee' => 'boolean',
		'seventy_five_percent_fee' => 'boolean',
		'fifty_percent_fee' => 'boolean',
        'twenty_five_percent_fee' => 'boolean',
        'none_fee',        
    ];

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y h:i A');
    }
}
