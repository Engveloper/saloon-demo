<?php

namespace App\Services\Spotify\Responses;

class AccessTokenResponse
{
    public function __construct(
        public string $accessToken,
        public string $tokenType,
        public int $expiresIn,
    ) {
    }

    public static function fromResponse(\Saloon\Http\Response $response): static
    {
        $json = $response->json();

        return new static(
            $json['access_token'],
            $json['token_type'],
            $json['expires_in']
        );
    }
}
