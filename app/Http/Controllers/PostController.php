<?php

namespace App\Http\Controllers;

use App\Http\DTO\PostDTO\PostDTO;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostServices;
use OpenApi\Attributes as OA;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostController extends Controller
{
    private  $postService;
    public function __construct(){
        $this->postService= new PostServices();

    }
    #[OA\Get(
        path: "/api/post",
        summary: "Get post",
        tags: ["posts"],

        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/PostResponse'
                )
            ),

        ]


    )]
    public function indexPost(): JsonResponse
    {
        $post=$this->postService->index();
        return response()->json(['data'=>$post],200);

    }


    #[OA\Get(
        path: "/api/post/{postId}",
        summary: "Get post",
        tags: ["posts"],
        parameters: [
            new OA\Parameter(
                name: "postId",
                description: "Get course",
                in: "path",
                required: true,
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(

                    ref: '#/components/schemas/PostResponse'
                )
            ),
            new OA\Response(
                response: 404,
                description: 'Not Found',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/NotFoundResponse'
                )
            ),
        ]

    )]

    public function viewPost($postId): JsonResponse
    {
        $post=$this->postService->view($postId);
        return response()->json(['data'=>[$post]]);

    }
    #[OA\Post(
        path: "/api/post",
        summary: "Create post",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
//
                ref: '#/components/schemas/PostRequestBodies'
            )
        ),
        tags: ["posts"],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
//
                    ref: '#/components/schemas/PostResponse'
                )
            )
        ]
    )]

    public function createPost(PostRequest $request): JsonResponse
    {

        $postDTO = new PostDTO();
        $postDTO->buildFromArray($request->validated());
        $post = $this->postService->create($postDTO);
        return response()->json(['data'=>[$post]]);

//        $post=$this->postService->create($request);
//        return response()->json(['data'=>[$post]]);

    }

    #[OA\Put(
        path: "/api/post/{postId}",
        summary: "Update post",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent
            (
                ref: '#/components/schemas/PostRequestBodies'
            )
        ),
        tags: ["posts"],
        parameters: [
            new OA\Parameter(
                name: "postId",
                description: "Get post",
                in: "path",
                required: true,
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(

                    ref: '#/components/schemas/PostResponse'
                )
            ),
            new OA\Response(
                response: 404,
                description: 'Not Found',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/NotFoundResponse'
                )
            ),
        ]
    )]
    public function updatePost(int $postId,PostRequest $request): JsonResponse
    {

        $postDTO = new PostDTO();
        $postDTO->buildFromArray($request->validated());
        $post = $this->postService->update($postId, $postDTO);
        return response()->json(['data' => [$post]]);

//        $post=$this->postService->update($postId,$request);
//        return response()->json(['data'=>[$post]]);

    }

    #[OA\Delete(
        path: "/api/post/{postId}",
        summary: "Delete post",
        tags: ["posts"],
        parameters: [
            new OA\Parameter(
                name: "postId",
                description: "Delete post",
                in: "path",
                required: true,
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'ok',
                content: new OA\JsonContent(
//                    properties: [
//                        new OA\Property(property: "message", type: "string", example: "удалено"),
//
//                    ]
                    ref: '#/components/schemas/DeletePostResponse'
                )

            ),
            new OA\Response(
                response: 404,
                description: 'Not Found',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/NotFoundResponse'
                )
            ),
        ]
    )]

    public function deletePost(int $postId): JsonResponse
    {
        $post=$this->postService->delete($postId);
        return response()->json(['data'=>[$post]]);

    }
}
