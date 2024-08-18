@extends('layout.base')

@section('content')
<body class="dam">
    {{-- @if (Auth::check() && Auth::user()->email == 'dam@example.com') --}}
    <div class="category-form dan">
        <h1 class="text-center">Dashboard</h1>

        {{-- !-- Lien ou bouton pour la déconnexion  --}}
        <form action="{{ route('auth.LoginAdmin') }}" method="POST" class="damaz"> 
             @csrf
            <button type="submit" class="button w-100 primary btn-deconnect" >Logout</button>
        </form> 

        <!-- Afficher les utilisateurs -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td >
                            <a href="{{ route('user.edit', $user->id) }}" class="button w-100 primary"  >Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button w-50 error" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br><br>
        <a href="{{ route('auth.register') }}"class="button w-100 primary" >Créer</a>
    </div>
</body>
@endsection



{{-- 
@else
<h1>ur jtu utkkiyri</h1>
@endif --}}
