<?php

namespace Modules\Nominatim;

use App\Contracts\GeocodingService as GeocodingServiceInterface;
use Illuminate\Support\Arr;

class GeocodingService implements GeocodingServiceInterface
{
    public function __construct(
        protected Client $client
    ) {
    }

    public function getPlaces(string $query, array $params = []): array
    {
        $limit = Arr::pull($params, 'limit', 30);

        $params = [
            'q' => $query,
            'format' => 'json',
            'limit' => $limit,
            'accept-language' => 'en',
            ...$params
        ];

        return json_decode($this->client->get('search', $params)->getBody()->getContents(), true);
    }
}
