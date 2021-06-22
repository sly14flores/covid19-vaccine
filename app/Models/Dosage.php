<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Traits\SelectionsRegistration;

class Dosage extends Model
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
        'encoder_user_id',
        'qr_pass_id',
        'brand_name',
        'vaccine_name',
        'site_of_injection',
        'vaccination_facility',
        'expiry_date',
        'batch_number',
        'lot_number',
        'dose',
        'diluent',
        'date_of_reconstitution',
        'time_of_reconstitution',
        'diluent_batch_number',
        'diluent_lot_number',
        'date_of_vaccination',
        'time_of_vaccination',
        'next_vaccination'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'brand_name' => 'integer',
        'vaccine_name' => 'integer',
        // 'batch_number' => 'integer',
        // 'lot_number' => 'integer',
        'dose' => 'integer',
        'diluent_batch_number' => 'integer',
        'diluent_lot_number' => 'integer',
        'expiry_date' => 'date',
        'date_of_reconstitution' => 'date',
        'date_of_vaccination' => 'date',
        'next_vaccination' => 'date',
        // 'time_of_reconstitution' => 'datetime',
    ];    

    protected $hidden = [
        'updated_at',
    ];    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaccinator()
    {
        return "{$this->user->firstname} {$this->user->lastname}";
    }

    public function dohVaccinator()
    {
        return ucfirst(strtolower($this->user->lastname)).", ".ucfirst(strtolower($this->user->firstname));
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

    public function vaccine_description($brand_id,$vaccine_id)
    {
        $brands = $this->brandValue();
        $brand = collect($brands)->where('id',$brand_id)->first();
        $vaccines = $brand['vaccines'];

        $vaccine = collect($vaccines)->where('id',$vaccine_id)->first();

        return $vaccine['name'];
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function pre_assessment()
    {
        return $this->hasOne(PreAssessment::class,'dosage_id');
    }

    public function post_assessment()
    {
        return $this->hasOne(PostAssessment::class,'dosage_id');
    }

    public function aefi()
    {
        return $this->hasOne(Aefi::class,'dosage_id');
    }

    public function vitals()
    {
        return $this->hasMany(ScreeningVital::class, 'dosage_id', 'id');
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
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getDateOfReconstitutionAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getDateOfVaccinationAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

     /**
     * @param $value
     * @return false|string
     */
    public function getNextVaccinationAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    
    /**
     * @param $value
     * @return false|string
     */
    public function getTimeOfReconstitutionAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }

    public function setTimeOfReconstitutionAttribute($value)
    {
        $this->attributes['time_of_reconstitution'] = Carbon::parse($value)->timezone('Asia/Manila')->format('Y-m-d H:i:s');
    }

}
