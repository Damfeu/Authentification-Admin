@extends('layout.base')

@section('content')
<body class="dam" >
    <div class="category-form dan">
  
        <h1 style="text-align: center">Welcome to Your Dashboard</h1>
        <p style="text-align: center">You have successfully logged in.</p>
    
        <!-- Information about the user -->
        <div>
            <h2 style="text-align: center">Your Details</h2>
            <ul style="list-style: none">
                <li><strong>Name:</strong> {{ Auth::user()->name }}</li><br>
                <li><strong>Email:</strong> {{ Auth::user()->email }}</li> <br>
            </ul>
        </div>
    
        <!-- Logout Button -->
        <form action="{{ route('auth.LoginAdmin') }}" method="POST">
            @csrf
            <button type="submit" class="button w-100 primary" >Logout</button>
        </form>
    </div>
</body>
@endsection




