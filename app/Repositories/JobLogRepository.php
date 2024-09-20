<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Repository\Contracts\RepositoryInterface;

interface JobLogRepository extends RepositoryInterface
{
    public function orderedByDate(?int $limit = null): Collection;
}
