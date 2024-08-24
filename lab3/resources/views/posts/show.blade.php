@extends('layouts.app')

@section("content")
    <div class="container mt-5 w-50 text-center">
        <div class="card">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <img src='{{asset("images/posts/". $post->image)}}'>
                <p class="card-text">{{$post->Description}}</p>
            </div>
        </div>
    </div>

@endsection