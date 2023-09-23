<?php

namespace App\Services\Spotify\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SearchRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/search';
    }
}
