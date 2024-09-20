<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

/**
 * @property string $job
 * @property string $state
 * @property Carbon $schedule_at
 * @property Carbon $created_at
 */
class JobLog extends Model
{
    use HasSpatial;

    protected $fillable = [
        'job_id',
        'job',
        'state',
        'schedule_at',
    ];

    protected $casts = [
        'schedule_at' => 'datetime',
    ];
}
