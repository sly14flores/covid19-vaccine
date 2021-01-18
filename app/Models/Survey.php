<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'lung_disease',
        'kidney_disease',
        'diabetes',
        'high_blood_pressure',
        'cancer',
        'leukemia',
        'hiv',
        'mental_problem',
        'others_health_condition',
        'none_of_the_above',
        'yes_pregnant_baby',
        'no_pregnant_baby',
        'not_sure_pregnant_baby',
    ];    
}
