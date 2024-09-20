<?php

namespace App\Http\Resources;

use App\DTO\PlaceWithCacheDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property PlaceWithCacheDTO $resource
 */
class GeoCacheableResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'geo' => PlaceResource::make($this->resource->getPlace()),
            'cache' => $this->resource->cacheStatus()->value,
        ];
    }
}
