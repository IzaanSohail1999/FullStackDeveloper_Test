<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedules;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shifts extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'label',
        'duration',
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
