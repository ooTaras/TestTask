<?php

namespace App\Services;

use App\Models\JobLog;
use App\Repositories\JobLogRepository;
use Illuminate\Support\Collection;

class JobLogsService
{
    public function __construct(
        protected JobLogRepository $repository
    ) {
    }

    public function limit(?int $limit = null): Collection
    {
        return $this->repository->orderedByDate($limit);
    }

    public function create(JobLog $jobLogs): JobLog
    {
        return $this->repository->create($jobLogs);
    }

    public function updateOrCreate(array $attributes, array $values = []): JobLog
    {
        return $this->repository->updateOrCreate($attributes, $values);
    }
}
