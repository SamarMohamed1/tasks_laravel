@extends('layouts.app')

@section('title') view @endsection

@section('content')

<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{$post->description}}</p>
    
  </div>
</div>

@endsection