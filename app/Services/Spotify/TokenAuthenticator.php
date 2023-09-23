<?php

namespace App\Services\Spotify;

use App\Services\Spotify\Requests\AccessTokenRequest;
use App\Services\Spotify\Responses\AccessTokenResponse;
use Saloon\Contracts\Authenticator;
use Saloon\Contracts\PendingRequest;

class TokenAuthenticator implements Authenticator
{
    protected static ?string $token = null;

    public function set(PendingRequest $pendingRequest): void
    {
        if ($pendingRequest->getRequest() instanceof  AccessTokenRequest) {
            return;
        }

        if (! static::$token) {
            $saloonResponse = $pendingRequest->getConnector()->send(new AccessTokenRequest());
            $response = AccessTokenResponse::fromResponse($saloonResponse);

            static::$token = $response->accessToken;
        }

        $pendingRequest->headers()->add('Authorization', 'Bearer ' . static::$token);
    }
}
