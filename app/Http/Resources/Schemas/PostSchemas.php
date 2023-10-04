<?php

namespace App\Http\Resources\Schemas;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ['postId', 'name','description']
)]
class PostSchemas extends JsonResource
{
    #[OA\Property(
        maxLength: 16,
        example: 'abc'
    )]
    public string $name;

    #[OA\Property(
        maxLength: 64,
        example: 2
    )]
    public int $postId;

    #[OA\Property(
        maxLength: 255,
        example: 'HELLO'
    )]
    public string $description;
}
