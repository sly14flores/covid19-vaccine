<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class PostAssessment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qr_pass_id',
        'dose',
        'assessments',
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

    public function vaccine()
    {
        return $this->belongsTo(PostAssessment::class);
    }

}
