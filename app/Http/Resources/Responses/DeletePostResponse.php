<?php

namespace App\Http\Resources\Responses;

namespace App\Http\Resources\Responses;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ["data"]
)]
class DeletePostResponse extends JsonResource
{

    #[OA\Property(
        property: "data",  example: ['message'=>["удалено"]]
    )]
//    #[OA\Property(
//            ref: '#/components/schemas/PostSchemas'
//    )]

    public object $data;
}
