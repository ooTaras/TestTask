<?php

namespace App\DTO;

use App\Enums\CacheStatusEnum;
use App\Models\Place;

class PlaceWithCacheDTO
{
    public function __construct(
        protected ?Place $place,
        protected CacheStatusEnum $cacheStatus,
    ) {
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function cacheStatus(): CacheStatusEnum
    {
        return $this->cacheStatus;
    }
}
