<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
class PostServices
{
    public function index(): Collection
    {
        return Post::all();
    }

    public function view(int $postId){
        $post =Post::query()->findOrFail($postId);
        return $post;
    }

    public function create($request){

        $post =Post::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return $request;
    }

    public function update($postId,$request){
        $post =Post::find($postId);

        $post->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return $post;
    }

    public function delete($postId){
        $post =Post::find($postId);
        $post->delete();
        return ['massage'=>'Удалено'];
    }
}
