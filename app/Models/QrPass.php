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

    public function barangay()
    {
        return $this->belongsTo(Barangay::class,'addressbrgy','brgyCode');
    }
}
