@extends('layouts.app')

@section("content")

    <div class="container mt-5">
         <form>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control w-50" name="title" id="title" >
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label><br>
                    <textarea name="description"  id="description" cols="70"></textarea>
                </div>
                <div class="mb-3 ">
                    <label  for="creator">Post Creator</label><br>
                    <input type="text" class=" form-control w-50" id="creator" name="creator">
                </div>
                <input type="submit" class="btn btn-primary" value="Edit">
        </form>
    </div>
   
@endsection