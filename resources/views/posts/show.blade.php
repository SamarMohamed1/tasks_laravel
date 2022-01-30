@extends('layouts.app')

@section('title') show @endsection

@section('content')

@foreach ($allPosts as $post)
        <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header">{{ $post['title'] }}<</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post['posted_by'] }}</h5>
            <p class="card-text">{{ $post['created_at'] }}</p>
        </div>
        </div>
@endforeach

@endsection
    



















