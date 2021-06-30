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
        'dose' => 'integer',
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
        if (is_null($this->user)) {
            $vaccinator = "";
        } else {
            $vaccinator = "{$this->user->firstname} {$this->user->lastname}";
        }
        return $vaccinator;
    }

    public function dohVaccinator()
    {
        if (is_null($this->user)) {
            $vaccinator = "";
        } else {
            $vaccinator = ucfirst(strtolower($this->user->lastname)).", ".ucfirst(strtolower($this->user->firstname));
        }
        return $vaccinator;
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

        return $brand['name'] ?? "";

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

    public function monitoringVitals()
    {
        return $this->hasMany(MonitoringVital::class, 'dosage_id', 'id');
    }    

    /**
     * Dosage Hospital Rel
     */
    public function cbcr()
    {
        return $this->belongsTo(Hospital::class, 'vaccination_facility', 'id');
    }

    public function cbcr_id()
    {
        $hospital = (is_null($this->user))?null:$this->user->userHospital;
        return (is_null($hospital))?"":$hospital->cbcr_id;
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
        return Carbon::parse($value)->format('n/d/Y');
    }

    /**
     * @param $value
     * @return false|string
     */
    public function setExpiryDateAttribute($value)
    {
        $this->attributes['expiry_date'] = Carbon::parse($value)->timezone('Asia/Manila')->format('Y-m-d');
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
    public function setDateOfReconstitutionAttribute($value)
    {
        $this->attributes['date_of_reconstitution'] = Carbon::parse($value)->timezone('Asia/Manila')->format('Y-m-d');
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
    public function setDateOfVaccinationAttribute($value)
    {
        $this->attributes['date_of_vaccination'] = Carbon::parse($value)->timezone('Asia/Manila')->format('Y-m-d');
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
    public function setNextVaccinationAttribute($value)
    {
        $this->attributes['next_vaccination'] = Carbon::parse($value)->timezone('Asia/Manila')->format('Y-m-d');
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
        $this->attributes['time_of_reconstitution'] = Carbon::parse($value)->timezone('Asia/Manila')->format('H:i:s');
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getTimeOfVaccinationAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }

    public function setTimeOfVaccinationAttribute($value)
    {
        $this->attributes['time_of_vaccination'] = Carbon::parse($value)->timezone('Asia/Manila')->format('H:i:s');
    }    

}
