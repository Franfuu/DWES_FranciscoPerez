@extends('layouts.app')

@section('title', 'Trophies for ' . $user->name)

@section('content')
    <p><a href="{{ url('/users') }}">← Back to users</a></p>

    @php
        $trophies = $user->relationLoaded('trophies') ? $user->trophies : $user->trophies()->get();
    @endphp

    @if ($trophies->isEmpty())
        <p class="muted">No trophies yet.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Trophy ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($trophies as $trophy)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trophy->id }}</td>
                    <td><strong>{{ $trophy->title }}</strong></td>
                    <td class="muted">{{ $trophy->description }}</td>
                    <td class="muted">{{ optional($trophy->created_at)->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection