<?php

namespace App\Contracts;

interface GeocodingService
{
    public function getPlaces(string $query, array $params = []): array;
}
