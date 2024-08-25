@extends('layouts.app')

@section("content")

<div class="container mt-5">
    <h1 class="mt-5 text-danger"> Create your Account!</h1>

    <form method="POST" action="{{route("users.store")}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
            @error("name")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old("email")}}">
            @error("email")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{old("password")}}">
            @error("password")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="inputGroupFile02" value="{{old("image")}}">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
            @error("image")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success rounded-3 mt-3">Submit</button>

    </form>
</div>


@endsection




