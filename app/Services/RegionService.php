<?php

namespace App\Services;

use App\Contracts\GeocodingService;

class RegionService
{
    public function __construct(
        protected GeocodingService $geocodingService
    ) {
    }

    public function getUkrainianRegions(): array
    {
        return $this->geocodingService->getPlaces('Oblast Ukraine');
    }
}
