<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Define the relationship with the Employees model.
     *
     * @return BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }

    /**
     * Define the relationship with the Locations model.
     *
     * @return BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Locations::class);
    }

    /**
     * Define the relationship with the Shifts model.
     *
     * @return BelongsTo
     */
    public function shift()
    {
        return $this->belongsTo(Shifts::class);
    }

}
