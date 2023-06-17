<?php

namespace App\Models;

use App\AppHumanResources\Attendance\Domain\Attendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedules;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'age',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedules::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendanceFaults()
    {
        return $this->hasMany(AttendanceFault::class);
    }
}
