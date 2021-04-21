<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class QrPass extends Model
{
    use HasFactory;

    protected $connection = 'napanam';

    protected $table = 'qrpasses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'qr_pass_id',
        'name', # lastname firstname middlename
        'type', # Person
        'category', # Resident
        'lastname',
        'firstname',
        'middlename',
        'gender',
        'nationality', # PHL
        'dob',
        'occupation',
        'age',
        'mobile_number',
        'email',
        'address', # Street / Road
        'addressbrgy',
        'addressmunicity',
        'addressprovince',
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

    public function province()
    {
        return $this->belongsTo(Province::class,'addressprovince','provCode');  
    }

    public function cityMun()
    {
        return $this->belongsTo(CityMun::class,'addressmunicity','citymunCode');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class,'addressbrgy','brgyCode');
    }

}
