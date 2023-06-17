<?php

namespace App\AppHumanResources\Attendance\Domain;

use App\Models\Employees;
use App\Models\Schedules;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'employee_id',
        'schedule_id',
        'present',
        'check_in_time',
        'check_out_time',
        'date',
    ];

    // Define the relationships with other models

    /**
     * Get the employee associated with the attendance record.
     *
     * @return BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }

    /**
     * Get the schedule associated with the attendance record.
     *
     * @return BelongsTo
     */
    public function schedule()
    {
        return $this->belongsTo(Schedules::class);
    }
}
