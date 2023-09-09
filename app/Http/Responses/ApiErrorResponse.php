<?php

namespace App\Http\Responses;

use App\Enum\Error;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use Symfony\Component\HttpFoundation\Response;

final class ApiErrorResponse implements Responsable
{
    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly Error $code,
        private readonly Http $status = Http::INTERNAL_SERVER_ERROR
    ) {}

    public function toResponse($request): Response
    {
        return new JsonResponse(
            data: [
                'title' => $this->title,
                'description' => $this->description,
                'code' => $this->code->value,
                'status' => $this->status->value,
            ],
            status: $this->status->value,
        );
    }
}
