@extends('layout.base')

@section('content')
<body class="dam">
    <div>
        <div>
            <form action="{{ route('auth.register') }}" method="POST" class="category-form dan">

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>
                @endif
                @csrf

                <div>
                    <h1 class="text-center">Registration</h1>
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                {{-- <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"> --}}

                   
                    
                {{-- </div> --}}

                

                <button class="button w-100 primary">Register</button><br/><br>
                <a href="{{ route('auth.dashboard')}}">Back to Dashboard</a>
            </form>
        </div>
    </div>
</body>
@endsection
