@extends('layouts.app')

@section("content")

<div class="container mt-5">

    <form method="POST" action="{{route("users.update")}}" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
            @error("name")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error("email")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
            @error("password")
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

        <button type="submit" class="btn btn-success rounded-3 mt-3">Submit</button>
    </form>
</div>


@endsection