<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class MonitoringVital extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dosage_id',
        'dose',
        'date_collected',
        'time_collected',
        'systolic',
        'diastolic',
        'pulse_rate',
        'temperature',
        'respiratory_rate',
        'oxygen',
        'pain_score',
    ];

    protected $hidden = [
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dose' => 'integer',
        'date_collected' => 'date',
    ];

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y h:i A');
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getDateCollectedAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getTimeCollectedAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }      

    public function setTimeCollectedAttribute($value)
    {
        $this->attributes['time_collected'] = Carbon::parse($value)->format('H:i:s');
    }    

    public function dosage()
    {
        return $this->belongsTo(Dosage::class, 'dosage_id', 'id');
    }    
}
