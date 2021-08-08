<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Aefi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dosage_id',
        'qr_pass_id',
        'dose',
        'has_adverse_event',
        'adverse_event_condition',
        'other_adverse_event_condition',
        'adverse_events', // serialize_array
        'others',
        'date',
        'time',
        'is_serious',
        'serious', // serialize_array
        'other_serious',
        'current_status', // serialize_array
    ];

    protected $casts = [
      'is_serious' => 'boolean',
      'has_adverse_event' => 'boolean',
      'dose' => 'integer',
    ];

    public function setAdverseEventsAttribute($value)
    {
        $this->attributes['adverse_events'] = serialize($value);
    }

    public function getAdverseEventsAttribute($value)
    {
        return unserialize($value);
    }

    public function setSeriousAttribute($value)
    {
        $this->attributes['serious'] = serialize($value);
    }

    public function getSeriousAttribute($value)
    {
        return unserialize($value);
    }

    public function setCurrentStatusAttribute($value)
    {
        $this->attributes['current_status'] = serialize($value);
    }

    public function getCurrentStatusAttribute($value)
    {
        return unserialize($value);
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y h:i A');
    }
    
    public function AdverseEvents()
    {
        return [
            ['key'=>1, 'description'=>'Abdominal Pain', 'value'=>false],
            ['key'=>2, 'description'=>'Body Malaise', 'value'=>false],
            ['key'=>3, 'description'=>'Colds', 'value'=>false],
            ['key'=>4, 'description'=>'Cough', 'value'=>false],
            ['key'=>5, 'description'=>'Diarrhea', 'value'=>false],
            ['key'=>6, 'description'=>'Fainting', 'value'=>false],
            ['key'=>7, 'description'=>'Fatigue', 'value'=>false],
            ['key'=>8, 'description'=>'Fever', 'value'=>false],
            ['key'=>9, 'description'=>'Headache', 'value'=>false],
            ['key'=>10, 'description'=>'Joint Pain', 'value'=>false],
            ['key'=>11, 'description'=>'Local site pain', 'value'=>false],
            ['key'=>12, 'description'=>'Loss of appetite', 'value'=>false],
            ['key'=>13, 'description'=>'Muscle Pain', 'value'=>false],
            ['key'=>14, 'description'=>'Nausea / Vomiting', 'value'=>false],
            ['key'=>15, 'description'=>'Numbness', 'value'=>false],
            ['key'=>16, 'description'=>'Rash / Itch', 'value'=>false],
            ['key'=>17, 'description'=>'Redness', 'value'=>false],
            ['key'=>18, 'description'=>'Retroorbital Pain', 'value'=>false],
            ['key'=>19, 'description'=>'Swelling', 'value'=>false],
            ['key'=>20, 'description'=>'Anaphylaxis', 'value'=>false],
            ['key'=>21, 'description'=>'Injection site abscess', 'value'=>false],
            ['key'=>22, 'description'=>'Seizures', 'value'=>false, 'subs'=>[
                    ['key'=>1, 'description'=>'febrile', 'value'=>false],
                    ['key'=>2, 'description'=>'aferbrile', 'value'=>false],
                ]
            ],
            ['key'=>23, 'description'=>'Sepsis', 'value'=>false],
            ['key'=>24, 'description'=>'Encephalopathy', 'value'=>false],
            ['key'=>25, 'description'=>'Thrombocytopenia', 'value'=>false],
            ['key'=>26, 'description'=>'Toxic shock syndrome', 'value'=>false],
            ['key'=>27, 'description'=>'Fever >38oC', 'value'=>false],
            ['key'=>28, 'description'=>'Severe local reaction', 'value'=>false, 'subs'=>[
                ['key'=>1, 'description'=>'Pain, redness and/or swelling of >3 days', 'value'=>false],
                ['key'=>2, 'description'=>'swelling beyond nearest joint', 'value'=>false],
            ]
        ],
        ];
    }
    public function Serious()
    {
        return [
            ['key'=>1, 'description'=>'Death', 'value'=>false],
            ['key'=>2, 'description'=>'Life Threatening', 'value'=>false],
            ['key'=>3, 'description'=>'Disability', 'value'=>false],
            ['key'=>4, 'description'=>'Hospitalization', 'value'=>false],
            ['key'=>5, 'description'=>'Congenital anomaly', 'value'=>false],
            ['key'=>6, 'description'=>'Others important medical event', 'value'=>false],
        ];
    }
    public function CurrentStatus()
    {
        return [
            ['key'=>1, 'description'=>'Currently under treatment in facility', 'value'=>false],
            ['key'=>2, 'description'=>'Treated and sent home', 'value'=>false],
        ];
    }
}
