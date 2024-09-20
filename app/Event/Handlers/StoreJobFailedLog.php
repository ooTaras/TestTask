<?php

namespace App\Event\Handlers;

use App\Enums\JobStateEnum;
use App\Services\JobLogsService;
use Illuminate\Queue\Events\JobFailed;

class StoreJobFailedLog
{
    public function __construct(
        protected JobLogsService $service
    ) {
    }

    public function handle(JobFailed $jobFailed): void
    {
        $this->service->updateOrCreate(
            ['job_id' => $jobFailed->job->uuid()],
            ['state' => JobStateEnum::FAILED]
        );
    }
}
