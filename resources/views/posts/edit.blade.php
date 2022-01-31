@extends('layouts.app')

@section('title') update @endsection

@section('content')
        <form method="POST" action="{{ route('posts.update') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>  
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control">
                    @foreach ($post as $post)
                        <option value="{{$post->id}}">{{$post->name}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">update Post</button>
        </form>
@endsection
    
