<?php

namespace App\Http\Resources;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Place $resource
 */
class PlaceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'oblast' => $this->resource->name,
        ];
    }
}
