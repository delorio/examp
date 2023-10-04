<?php

namespace App\Http\Resources\RequestBodies;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;
#[OA\RequestBody(
    request: 'CourseRequestBody',
    description: 'Post request body',
    required: true,
    content: [
        new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                ref: '#/components/schemas/PostRequestBodies'
            )
        )
    ]
)]

#[OA\Schema(
    required: ['postId','name','description']
)]
class PostRequestBodies extends JsonResource
{
    #[OA\Property(
        example: 'PHP'
    )]
    public string $name;

    #[OA\Property(
        example: 'PHP Courses'
    )]
    public string $description;

//    #[OA\Property(
//        example: 1
//    )]
//    public string $postId;
}
