@extends('layouts.app')

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

@endsection
    



















