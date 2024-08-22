@extends('layouts.app')

@section("content")

<div class="container mt-5">
    <form method="post" action="{{ route('posts.edit', $post->id) }}" enctype="multipart/form-data">
        @csrf
      
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control w-50" name="title" id="title" value="{{$post->title}}">
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label><br>
            <textarea name="description" id="description" cols="70" value="{{$post->Description}}"></textarea>
        </div>
        <div class="mb-3 ">
            <label for="creator">Post Creator</label><br>
            <input type="text" class=" form-control w-50" id="creator" name="creator" value="{{$post->postedBy}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
</div>

@endsection