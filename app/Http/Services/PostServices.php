<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostServices
{
    public function index(): Collection
    {
        return Post::all();
    }

    public function view(int $postId)
    {
        try {
            $post =Post::query()->findOrFail($postId);
            return $post;
        } catch (ModelNotFoundException $exception) {
            abort(404, 'Post Not Found');
        }

    }

    public function create($request){

        $post =Post::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return $request;
    }

    public function update($postId,$request){

        try {
            $post =Post::findOrFail($postId);

            $post->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return $post;
        } catch (ModelNotFoundException $exception) {
            abort(404, 'Post Not Found');
        }

    }

    public function delete($postId){
        try {
            $post = Post::findOrFail($postId);
            $post->delete();
            return ['massage' => 'Удалено'];
        }catch (ModelNotFoundException $exception) {
            abort(404, 'Post Not Found');
        }
    }
}
