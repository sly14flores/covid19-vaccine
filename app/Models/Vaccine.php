<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Traits\SelectionsRegistration;

class Vaccine extends Model
{
    use HasFactory, SelectionsRegistration;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'qr_pass_id',
        'vaccine_name',
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

    public function facility()
    {
        return (is_null($this->user->userHospital))?null:$this->user->userHospital->description;
    }

    public function prc()
    {
        return $this->user->prc_number;
    }

    public function role()
    {
        return $this->user->groupName($this->user->id);
    }    

    public function vaccine($id)
    {
        $vaccines = $this->vaccineValue();

        $vaccine = collect($vaccines)->filter(function($vaccine) use ($id) {
            return $vaccine['id'] == $id;
        })->first();

        return $vaccine['name'];
    }

}
