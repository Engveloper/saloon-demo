<?php

namespace App\Services\Spotify;

use App\Services\Spotify\Responses\AccessTokenResponse;
use App\Services\Spotify\Responses\SearchResponse;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Connector;

class Client extends Connector
{
    public function resolveBaseUrl(): string
    {
        return "https://api.spotify.com/v1";
    }

    public function search(string $query, string $type): SearchResponse
    {
        $request = new Requests\SearchRequest();
        $request->query()
            ->add('q', $query)
            ->add('type', $type);

        $response = $this->send($request);

        return SearchResponse::fromResponse($response);
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator();
    }
}
