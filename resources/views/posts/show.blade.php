<!-- @extends('layouts.app')

@section('title') show @endsection

@section('content')

@foreach ($allPosts as $post)
        <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header">{{ $post->title }}<</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->created_at }}</h5>
        </div>
        </div>
@endforeach

@endsection -->

@extends('layouts.app')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($allPosts as $post)
             {{-- @dd($post->user, $post->user()) --}}
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ isset($post->user) ? $post->user->name : 'Not Found' }}</td>
                {{-- @dd($post->created_at) carbon object --}}
                <td>{{ $post->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
@endsection
    
    



















