<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class VaccineAdministration extends Model
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
        return (is_null($this->user->userHospital))?null:$this->user->userHospital->description;
    }

    public function dosages()
    {
        return $this->hasMany(Vaccine::class);
    }
}
