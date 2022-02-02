<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
Use App\Models\Post;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index(){
        $allposts = Post::all();
        return $allposts;
    }

    public function show($postId)
    {
    $post = Post::find($postId);
    return [
       'id' =>$post->id,
       'title' =>$post->title,
       'description' =>$post->description,
       'user_name' =>$post->user->name,

    ];
    }


    public function store(StorePostRequest $request)
    {
        
         $data = $request->all();
         $post =Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
           
         ]);
        return $post;
        }
}
