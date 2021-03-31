<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Traits\SelectionsRegistration;

class Vaccine extends Model
{
    use HasFactory, SelectionsRegistration;

    protected $table = 'dosages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vaccine_id',
        'user_id',
        'qr_pass_id',
        'brand_name',
        'vaccine_name',
        'site_of_injection',
        'expiry_date',
        'batch_number',
        'lot_number',
        'dose',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaccinator()
    {
        return "{$this->user->firstname} {$this->user->lastname}";
    }

    public function proffession()
    {
        return $this->user->profession;
    }

    public function prc()
    {
        return $this->user->prc_number;
    }

    public function role()
    {
        return $this->user->groupName($this->user->group_id);
    }    

    public function brand($id)
    {
        $brands = $this->brandValue();

        $brand = collect($brands)->filter(function($brand) use ($id) {
            return $brand['id'] == $id;
        })->first();

        return $brand['name'];
    }

    public function vaccine()
    {
        return $this->belongsTo(VaccineAdministration::class);
    }

    public function pre_assessment()
    {
        return $this->hasOne(PreAssessment::class,'dosage_id');
    }

    public function post_assessment()
    {
        return $this->hasOne(PostAssessment::class,'dosage_id');
    }

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
    public function getExpiryDateAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }    

}
