<?php
namespace App\Http\Controllers;

use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        // Eager-load roles to avoid N+1 queries
        $players = Player::with('roles')->orderBy('name')->get();

        return view('players.index', compact('players'));
    }
}