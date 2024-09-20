<?php

namespace Modules\Nominatim;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\MessageInterface;

class Client
{
    public function get(string $path, array $params = []): PromiseInterface | Response | MessageInterface
    {
        $url = new Url($path, $params);

        return Http::timeout(20)
                   ->retry(3, 1100)
                   ->withHeader('User-Agent', 'Kanarskiy/1.0 (kanarskiy@example.com)')
                   ->get($url->toString());
    }
}
