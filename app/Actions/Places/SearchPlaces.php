<?php

namespace App\Actions\Places;

use App\Actions\Action;
use App\Actions\BaseAction;
use App\DTO\PlaceWithCacheDTO;
use App\Enums\CacheStatusEnum;
use App\Http\Resources\GeoCacheableResource;
use App\Services\PlaceService;
use Illuminate\Support\Facades\Cache;

class SearchPlaces extends BaseAction implements Action
{
    public function __construct(
        protected PlaceService $service
    ) {
    }

    public function execute(array $parameters = [])
    {
        $longitude = $this->parameters['lon'];
        $latitude = $this->parameters['lat'];

        $cacheKey = "place_{$longitude}_$latitude";
        $isCacheExist = Cache::has($cacheKey) ? CacheStatusEnum::EXIST : CacheStatusEnum::MISS;

        $place = Cache::remember(
            $cacheKey,
            config('cache.palace.ttl'),
            fn() => $this->service->search($longitude, $latitude)
        );

        return GeoCacheableResource::make(new PlaceWithCacheDTO($place, $isCacheExist));
    }
}
