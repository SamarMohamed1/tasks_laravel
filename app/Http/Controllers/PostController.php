<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Carbon\Carbon;


class PostController extends Controller
{
    public function index()
    {
        (Carbon::now()->toDateString());
        // $allPosts = Post::where('title','Test')->get();
        $allPosts = Post::SimplePaginate(3); //to retrieve all records

        return view('posts.index', [
            'allPosts' => $allPosts,
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request)
    {
         $data = $request->all();
         Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
           
        ]);
        return redirect()->route('posts.index');
        }



        public function show($slug)
        {
        $post = Post::where('slug',$slug)->get();
        return view('posts.show',['post'=>$post]);
        } 



        public function edit($postId)
        {
        $post = Post::find($postId);
        $users = User::all();
        
        return view('posts.edit', [
        'post' => $post,
        'users' => $users
        
        ]);
        }



        public function update ($postId, StorePostRequest $request)
        {
        $data = $request->all();
    
        POST::find($postId)->update([

        'title' => $data['title'],
        'description' => $data['description'],
        'user_id' => $data['post_creator'],
        ]);
        return redirect()->route('posts.index');
        }
        
        

        public function destroy($postId)
        {
            $data=Post::find($postId);
            $data->delete();
            return redirect()->route(('posts.index'));
        }
}
