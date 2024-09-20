<?php

namespace App\Providers;

use App\Event\Handlers\StoreJobProcessingLog;
use App\Event\Handlers\StoreJobQueuedLog;
use App\Event\Handlers\StoreJobFailedLog;
use App\Event\Handlers\StoreJobProcessedLog;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobQueued;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        JobQueued::class => [
            StoreJobQueuedLog::class,
        ],
        JobProcessing::class => [
            StoreJobProcessingLog::class,
        ],
        JobProcessed::class => [
            StoreJobProcessedLog::class,
        ],
        JobFailed::class => [
            StoreJobFailedLog::class,
        ],
    ];
}
