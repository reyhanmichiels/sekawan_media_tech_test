<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        "name",
        "type",
        "status",
        "owner"
    ];

    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class);
    }
}
