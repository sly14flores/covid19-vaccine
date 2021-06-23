<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Vaccine extends Model
{
    use HasFactory;

    protected $table = 'vaccines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qr_pass_id',
        'vaccination_facility',
        'facility_others',
        'vaccination_session',
    ];

    protected $hidden = [
        'updated_at',
    ];    

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y h:i A');
    }

    public function facility()
    {
        return $this->belongsTo(Hospital::class, 'vaccination_facility');
    }

    public function session($id)
    {
        $sessions = config('constants.sessions');

        $session = collect($sessions)->where('id',$id);
        return (count($session))?$session->first()['name']:null;
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'qr_pass_id', 'qr_pass_id');
    }

    public function dosages()
    {
        return $this->hasMany(Dosage::class, 'vaccine_id', 'id');
    }
}
