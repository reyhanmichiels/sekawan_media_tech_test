<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Rent extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        "vehicle_id",
        "user_rent_id",
        "user_approve_id_1",
        "user_approve_id_2",
        "approve_status_1",
        "approve_status_2",
        "status",
        "StartAt",
        "EndAt"
    ];

    public function getStartAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getEndAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function setStartAtAttribute($value)
    {
        $this->attributes['StartAt'] =  Carbon::parse($value);
    }

    public function setEndAtAttribute($value)
    {
        $this->attributes['EndAt'] =  Carbon::parse($value);
    }
}
