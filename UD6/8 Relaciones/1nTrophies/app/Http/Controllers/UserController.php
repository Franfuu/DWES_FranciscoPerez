<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // Show all users and their trophies
    // Route: /users
    public function index()
    {
        // Eager-load trophies to reduce queries
        $users = \App\Models\User::with('trophies')->get();
        return view('users.index', compact('users'));
    }

    // Show trophies for a specific user
    // Route: /users/{id}/trophies
    public function showTrophies($id)
    {
        // Eager-load trophies to reduce queries
        $user = User::with('trophies')->findOrFail($id);

        return view('users.trophies', compact('user'));
    }
}