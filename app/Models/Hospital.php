<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

use Carbon\Carbon;

use App\Models\User;

class Hospital extends Model
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'slots',
        'cbcr_id',
        'location'
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

    public function users()
    {
        return $this->hasMany(User::class, 'hospital');
    }

    public function municipalityName($id)
    {

        if (is_null($id)) {
            return null;
        }

        $municipalities = config('constants.municipalities');

        $municipality = collect($municipalities)->where('id',$id)->first();

        return $municipality['name'];
    }

}
