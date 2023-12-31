<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use http\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read array{message: string} $resource
 */
final class MessageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        //        dd($this->resource['message']);
        return [
            'message' => $this->resource['message'],
        ];
    }
}
