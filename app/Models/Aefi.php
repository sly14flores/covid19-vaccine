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
        'adverse_events', // serialize_array
        'others', 'date',
        'time',
        'is_serious',
        'serious', // serialize_array
        'other_serious',
        'current_status', // serialize_array
    ];

    protected $casts = [
      'is_serious' => 'boolean'
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
            ['key'=>2, 'description'=>'Seizures', 'value'=>false, 'subs'=>[
                    ['key'=>1, 'description'=>'febrile', 'value'=>false],
                    ['key'=>2, 'description'=>'aferbrile', 'value'=>false],
                ]
            ],
        ];
    }
}
