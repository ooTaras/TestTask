<?php

namespace App\Services;

use App\Models\Place;
use App\Repositories\PlaceRepository;

class PlaceService
{
    public function __construct(
        protected PlaceRepository $repository
    ) {
    }

    public function search(string $longitude, string $latitude): ?Place
    {
        return $this->repository->search($longitude, $latitude);
    }

    public function create(Place $place): Place
    {
        return $this->repository->create($place);
    }

    public function truncate(): void
    {
        $this->repository->truncate();
    }
}
