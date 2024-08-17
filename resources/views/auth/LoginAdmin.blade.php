@extends('layout.base')
@section('content')
<body class="dam">
    <div>
        <div>
            <form action="{{ route('auth.dashboard') }}" method="post" class="category-form dan">

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>
                @endif

                @csrf
                <div>
                    <h1 class="text-center">To log in</h1>
                </div>


                <div>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
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

                <button class="button w-100 primary">To log in</button>
                <br /><br />
                
            </form>
        </div>

    </div>
</body>
    
@endsection