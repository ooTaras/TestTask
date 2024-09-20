<?php

namespace App\ValueObjects;

use MatanYadaev\EloquentSpatial\Enums\Srid;
use MatanYadaev\EloquentSpatial\Objects\Point as BasePoint;

class Point extends BasePoint
{
    public function __construct(float $longitude, float $latitude, int | Srid $srid = 0)
    {
        parent::__construct($latitude, $longitude, $srid);
    }
}
