<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        // Check if a user with the same email already exists in the database
        $existingUser = User::where('email', $request->input('email'))->first();

        // If the user with the same email exists, redirect back with an error message
        if ($existingUser) {
            return redirect()->back()->with('error', 'User with the given email already exists.');
        }

        // Create a new user if no duplicate email is found
        $user = User::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            "middle_name" => $request->middle_name,
            'user_role' => $request->user_role,
            'username' => $request->username,
            'position' => $request->position,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hashing the password for security
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User created successfully.');
    }


    public function update(Request $request, $user)
    {
        $user = User::find($user);
        $user->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'user_role' => $request->user_role,
            'username' => $request->username,
            'position' => $request->position,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
