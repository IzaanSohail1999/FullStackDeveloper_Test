<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\AppHumanResources\Attendance\Domain\Attendance;

class AttendanceFault extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'attendance_id',
        'reason',
        'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
