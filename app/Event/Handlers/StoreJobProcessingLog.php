<?php

namespace App\Event\Handlers;

use App\Enums\JobStateEnum;
use App\Services\JobLogsService;
use Illuminate\Queue\Events\JobProcessing;

class StoreJobProcessingLog
{
    public function __construct(
        protected JobLogsService $service
    ) {
    }

    public function handle(JobProcessing $jobProcessing): void
    {
        $this->service->updateOrCreate(
            ['job_id' => $jobProcessing->job->uuid()],
            ['state' => JobStateEnum::PROCESSING]
        );
    }
}
