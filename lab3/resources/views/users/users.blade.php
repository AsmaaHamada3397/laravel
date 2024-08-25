@extends('layouts.app')

@section("content")

    <div class="container">
        <table class="table text-center mt-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated_At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td><img src='{{asset("images/users/". $user->image)}}' width="50" height="50"></td>
                    <td>{{$user->created_at->format('d M Y , h:i A')}}</td> <!--H for 24 hours and h for 12hour-->
                    <td>{{$user->updated_at->format('d M Y , h:i A')}}</td> <!--A for AM/PM hours and a for am/pm-->
                    <td>
                        <a href={{route("users.show" , $user)}} class="btn btn-info">Show</a>
                        <a href={{route("users.edit", $user)}} class="btn btn-warning">Edit</a>
                        <form action="{{route('users.destroy', $user->id)}}" method="user" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="container my-5 text-center">
        <a href="{{ route('users.create') }}" class="btn btn-success">Create User</a>
    </div>
    <div class="d-flex justify-content-center mb-4">
        {{ $users->links() }}
    </div>
@endsection

