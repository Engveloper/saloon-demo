<?php

namespace App\Services\Spotify\Responses;

use Illuminate\Support\Arr;
use Saloon\Http\Response;

class SearchResponse
{
    public function __construct(
        public ?array $artists,
        public ?array $tracks,
    )
    { }

    public static function fromResponse(Response $response): static
    {
        $json = $response->json();
        $type = $response->getRequest()->query()->get('type');

        return new static(
            $json['artists'],
            $json['tracks']
        );
    }
}
