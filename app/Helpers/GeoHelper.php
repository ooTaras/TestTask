<?php

namespace App\Helpers;

use App\ValueObjects\Point;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Polygon;

class GeoHelper
{
    public static function boundingBoxToWKT(array $boundingBox): Polygon
    {
        if (count($boundingBox) !== 4) {
            throw new \InvalidArgumentException('Bounding box must contain exactly 4 coordinates.');
        }

        [$north, $south, $west, $east] = $boundingBox;

        $coordinates = [
            [$west, $north],
            [$east, $north],
            [$east, $south],
            [$west, $south],
            [$west, $north]
        ];

        $points = [];

        foreach ($coordinates as $coordinate) {
            $points[] = new Point(...$coordinate);
        }

        return new Polygon([new LineString($points)]);
    }
}
