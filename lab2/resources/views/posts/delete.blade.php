@extends('layouts.app')


@section('content')

<form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

@endsection