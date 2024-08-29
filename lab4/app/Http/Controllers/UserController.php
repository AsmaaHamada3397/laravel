<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(3);
        return view("users.users", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
   // app/Http/Controllers/UserController.php


   public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        // Handle the image upload if it exists
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $data['image'] = $image->storeAs('users', $filename, 'public');
        }

        // Create the user
        User::create($data);

        return to_route("users.index")->with('success', 'User registered successfully!');
    }



    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
