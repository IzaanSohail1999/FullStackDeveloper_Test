<?php

namespace App\Models;

use App\AppHumanResources\Attendance\Domain\Attendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedules;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'age',
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

    /**
     * Define the relationship with the Attendance model.
     *
     * @return HasMany
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Define the relationship with the AttendanceFault model.
     *
     * @return HasMany
     */
    public function attendanceFaults()
    {
        return $this->hasMany(AttendanceFault::class);
    }
}
