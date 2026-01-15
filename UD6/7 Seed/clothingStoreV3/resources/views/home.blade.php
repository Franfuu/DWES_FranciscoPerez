@extends('layouts.app')

@section('content')
  <h1>Welcome</h1>
  <ul>
    <li><a href="{{ route('users.index') }}">Go to Users CRUD</a></li>
    <li><a href="{{ route('clothing-items.index') }}">Go to Clothing CRUD</a></li>
  </ul>
@endsection