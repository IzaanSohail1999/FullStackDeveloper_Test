<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\AppHumanResources\Attendance\Domain\Attendance;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttendanceFault extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'attendance_id',
        'reason',
        'date',
    ];

    /**
     * Define the relationship with the Employee model.
     *
     * @return BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }

    /**
     * Define the relationship with the Attendance model.
     *
     * @return BelongsTo
     */
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
