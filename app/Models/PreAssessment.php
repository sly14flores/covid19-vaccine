<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class PreAssessment extends Model
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
        'consent',
        'reason',
        'dose',
        'assessments',
    ];

    protected $hidden = [
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'consent' => 'boolean',
    ];
    
    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y h:i A');
    }

    public function setAssessmentsAttribute($value)
    {
        $this->attributes['assessments'] = serialize($value);
    }

    public function getAssessmentsAttribute($value)
    {
        return unserialize($value);
    }

    public function dosage()
    {
        return $this->belongsTo(Vaccine::class,'dosage_id');
    }

}
