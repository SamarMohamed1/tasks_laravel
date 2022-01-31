<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function index()
    {
        // $allPosts = Post::where('title','Test')->get();
        $allPosts = Post::all(); //to retrieve all records

        return view('posts.index', [
            'allPosts' => $allPosts
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
        $data = request()->all();

        // Post::create($data);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            // will be ignored cause they aren't in fillable
            // 'un_known_column' => 'ajshdahsouid',
            // 'id' => 70,
        ]);// insert into (title,descripotion) values ('asdasd')

        // dd('test'); any logic after dd won't be executed
        //the logic to store post in the db
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        //query in db select * from posts where id = $postId
        $allPosts = Post::all(); //to retrieve all records

        return view('posts.show', [
            'allPosts' => $allPosts
        ]);
    }

    public function view($postId)
    {
        $post =post::find($postId);
        return view('posts.view',['post' => $post]);
    }

     public function edit($postId)
    {
        //query in db select * from posts where id = $postId
        $post =post::find($postId);
        return view('posts.edit',['posts' => $post]);
    }

    public function update(Request $req)
    {
        $data=Post::find($req->id);
        $data->title=$req->title;
        $data->description=$req->description;
        $data->save();
        return redirect()->route('posts.index');
    }

    public function destroy($postId)
    {
        $data=Post::find($postId);
        $data->delete();
        return redirect()->route(('posts.index'));
    }
}
