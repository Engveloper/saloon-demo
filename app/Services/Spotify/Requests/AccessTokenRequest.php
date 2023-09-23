<?php

namespace App\Services\Spotify\Requests;

use Saloon\Contracts\Body\BodyRepository;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

class AccessTokenRequest extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return 'https://accounts.spotify.com/api/token';
    }

    protected function defaultBody(): array
    {
        return [
            'grant_type' => 'client_credentials',
            'client_id' => '',
            'client_secret' => '',
        ];
    }
}
