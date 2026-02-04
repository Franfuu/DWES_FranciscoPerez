<?php
namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Eager load Championship to reduce queries
        $users = User::with('championship')->get();
        return view('users', compact('users'));
    }
}