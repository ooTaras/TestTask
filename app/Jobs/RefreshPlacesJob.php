<?php

namespace App\Jobs;

use App\DTO\PlaceDTO;
use App\Services\RegionService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class RefreshPlacesJob implements ShouldQueue
{
    use Queueable;

    public function handle(RegionService $regionService): void
    {
        $regions = $regionService->getUkrainianRegions();

        collect($regions)->each(function (array $place) {
            $placeDto = new PlaceDTO($place['name'], $place['lat'], $place['lon'], $place['boundingbox']);

            dispatch(new CreatePlaceJob($placeDto));
        });
    }
}
