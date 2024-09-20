<?php

namespace App\Event\Handlers;

use App\Enums\JobStateEnum;
use App\Services\JobLogsService;
use Illuminate\Queue\Events\JobQueued;
use Illuminate\Support\Carbon;

class StoreJobQueuedLog
{
    public function __construct(
        protected JobLogsService $service
    ) {
    }

    public function handle(JobQueued $jobQueued): void
    {
        $this->service->updateOrCreate(
            [
                'job_id' => $jobQueued->payload()['uuid'],
            ],
            [
                'job_id' => $jobQueued->payload()['uuid'],
                'job' => $jobQueued->job::class,
                'state' => JobStateEnum::QUEUED,
                'schedule_at' => Carbon::now()->addSeconds($jobQueued->delay),
            ]
        );
    }
}
