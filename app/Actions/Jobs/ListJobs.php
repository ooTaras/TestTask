<?php

namespace App\Actions\Jobs;

use App\Actions\Action;
use App\Actions\BaseAction;
use App\Http\Resources\JobStateResource;
use App\Services\JobLogsService;

class ListJobs extends BaseAction implements Action
{
    public function __construct(
        protected JobLogsService $service
    ) {
    }

    public function execute()
    {
        return JobStateResource::collection($this->service->limit($this->parameters['limit'] ?? null));
    }
}
