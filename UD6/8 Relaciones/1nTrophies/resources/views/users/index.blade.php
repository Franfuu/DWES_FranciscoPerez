@extends('layouts.app')

@section('title', 'Users')

@section('content')
    @if ($users->isEmpty())
        <p>No users found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Trophies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="muted">{{ $user->email }}</td>
                    <td>{{ $user->trophies_count ?? ($user->relationLoaded('trophies') ? $user->trophies->count() : $user->trophies()->count()) }}</td>
                    <td>
                        <a href="{{ route('users.trophies', $user->id) }}">View trophies</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @if (method_exists($users, 'links'))
            <div style="margin-top:1rem;">
                {{ $users->links() }}
            </div>
        @endif
    @endif
@endsection