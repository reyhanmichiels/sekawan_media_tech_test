<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
