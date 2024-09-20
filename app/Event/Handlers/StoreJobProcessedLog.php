<?php

namespace App\Event\Handlers;

use App\Enums\JobStateEnum;
use App\Services\JobLogsService;
use Illuminate\Queue\Events\JobProcessed;

class StoreJobProcessedLog
{
    public function __construct(
        protected JobLogsService $service
    ) {
    }

    public function handle(JobProcessed $jobProcessed): void
    {
        $this->service->updateOrCreate(
            ['job_id' => $jobProcessed->job->uuid()],
            ['state' => JobStateEnum::PROCESSED]
        );
    }
}
