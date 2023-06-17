<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedules;

class Locations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'zip_code',
        'address',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedules::class);
    }
}
