@extends('layout.base')

@section('content')
<body class="dam">
    <div  class="category-form dan">
        <h1 class="text-center">Edit User</h1>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </div>

            <button class="button w-100 primary">Update</button>
        </form>
    </div>
</body>
@endsection
