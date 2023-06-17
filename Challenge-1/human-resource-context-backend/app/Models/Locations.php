<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedules;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Locations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'zip_code',
        'address',
    ];

    /**
     * Define the relationship with the Schedules model.
     *
     * @return HasMany
     */
    public function schedules()
    {
        return $this->hasMany(Schedules::class);
    }
}
