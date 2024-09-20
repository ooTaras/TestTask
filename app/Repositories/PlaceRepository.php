<?php

namespace App\Repositories;

use App\Models\Place;
use Modules\Repository\Contracts\RepositoryInterface;

interface PlaceRepository extends RepositoryInterface
{
    public function search(string $longitude, string $latitude): ?Place;
}
