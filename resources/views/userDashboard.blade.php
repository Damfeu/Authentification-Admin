@extends('layout.base')

@section('content')
<div class="container mt-5">
    {{-- @if (Auth::check() && Auth::user()->email == 'dam@example.com') --}}
    <h1>Welcome to Your Dashboard</h1>
    <p>You have successfully logged in.</p>

    <!-- Information about the user -->
    <div>
        <h2>Your Details</h2>
        <ul>
            <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
            <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
        </ul>
    </div>

    <!-- Logout Button -->
    <form action="{{ route('auth.LoginAdmin') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection


{{-- @else
<h1>ur jtu utkkiyri</h1>
@endif --}}

