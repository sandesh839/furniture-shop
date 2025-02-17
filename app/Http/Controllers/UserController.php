<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Show the form to create a new user

    public function create()
    {
        return view('users.create');
    }

     // Store the newly created user in the database
     public function store(Request $request)
     {
         // Validate the request data
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email',
             'role' => 'required|in:admin,user',
         ]);
 
         // Create and save the new user
         User::create([
             'name' => $validated['name'],
             'email' => $validated['email'],
             'role' => $validated['role'],
             'password' => bcrypt('defaultpassword'), // Default password, can be changed later
         ]);
 
         // Redirect to the users index page with success message
         return redirect()->route('users.index')->with('success', 'User added successfully.');
     }

    //for index part
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('users.index', compact('users'));
    }

    // Show the form to edit a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Handle the form submission to update a user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
        ]);

        // Update user data
        $user->update($validated);

        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    //for destroy user
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}
}
