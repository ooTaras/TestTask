<?php

namespace App\Repositories\Implementation;

use App\Models\JobLog;
use App\Repositories\JobLogRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Repository\Eloquent\BaseRepository;

class EloquentJobLogRepository extends BaseRepository implements JobLogRepository
{
    public function model()
    {
        return JobLog::class;
    }

    public function orderedByDate(?int $limit = null): Collection
    {
        return $this->model
            ->orderByDesc('created_at')
            ->when($limit, fn(Builder $query) => $query->limit($limit))
            ->get();
    }
}
