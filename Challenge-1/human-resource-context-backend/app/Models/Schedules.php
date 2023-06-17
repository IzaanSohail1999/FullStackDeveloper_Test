<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'location_id',
        'shift_id',
        'date',
        'notes',
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }

    public function location()
    {
        return $this->belongsTo(Locations::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shifts::class);
    }

}
