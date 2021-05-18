<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

use Carbon\Carbon;
use App\Models\Hospital;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'hospital',
        'username',
        'password',
        'group_id',
        'profession',
        'prc_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y h:i A');
    }

    public function userHospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital');
    }

    public function groupName($id)
    {

        if (is_null($id)) {
            return null;
        }

        $groups = config('constants.groups');

        $group = collect($groups)->where('id',$id)->first();

        return $group['name'];
    }

    public function isAdmin()
    {
        return $this->group_id == 1;
    }

    public function notAdmin()
    {
        return $this->group_id != 1;
    }    
}
