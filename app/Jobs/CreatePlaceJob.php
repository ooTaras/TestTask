<?php

namespace App\Jobs;

use App\DTO\PlaceDTO;
use App\Helpers\GeoHelper;
use App\Models\Place;
use App\Services\PlaceService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class CreatePlaceJob implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected PlaceDTO $placeDTO
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(PlaceService $service): void
    {
        $service->create(new Place([
            'name' => $this->placeDTO->getName(),
            'lat' => $this->placeDTO->getLat(),
            'lng' => $this->placeDTO->getLng(),
            'area' => GeoHelper::boundingBoxToWKT($this->placeDTO->getArea())
        ]));
    }
}
