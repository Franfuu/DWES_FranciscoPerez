<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderByDesc('id')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);

        // En este punto del curso no se valida: ponemos un password por defecto si no se envía
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = bcrypt('password');
        }

        User::create($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->only(['name', 'email', 'password']);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // si no cambia, no lo tocamos
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}