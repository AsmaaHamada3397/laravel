@extends('layouts.app')

@section("content")
  
    <div class="container mt-5">
        <h1 class="mt-5 text-danger"> Create your post!</h1>
        <form method="POST" action="{{route("posts.store")}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            @error("title")
            <span class="text-danger">{{$message}}</span>
            @enderror
            
            </div>
            <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
            @error("image")
            <span class="text-danger">{{$message}}</span>
            @enderror    
        
        </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="description" class="form-control" name="description" id="description"></textarea>
                @error("description")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="postedBy">Post Creator</label>
                <input type="text" class="form-control" id="postedBy" name="postedBy">
                @error("postedBy")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success rounded-3 mt-3">Create</button>
            </form>
    </div>
   

    @endsection
