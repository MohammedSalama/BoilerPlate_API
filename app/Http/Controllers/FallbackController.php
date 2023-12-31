<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enum\Error;
use App\Http\Responses\ApiErrorResponse;
use Illuminate\Http\Request;
use JustSteveKing\StatusCode\Http;

final class FallbackController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return new ApiErrorResponse(
            title: 'Oops',
            description: 'Oops i broke some thing.',
            code: Error::AUTH_001,
            status: Http::I_AM_A_TEAPOT,
        );
    }
}
