@extends('layouts.sign')

@section('content')

<div class="container">
    <form class="form-signin" method="POST" action="{{ route('login') }}" style="width: 400px;">
        @csrf
        <div class="logo-sign text-center">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
        </div>
        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
            @error('email')
                {{-- <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> --}}
                <script>
                    iziToast.warning({
                        title: 'Maaf',
                        message: 'Email dan Password tidak cocok atau akun sedang tidak aktif',
                        position: 'topRight'
                    });
                </script>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        <p class="text-center">&copy; 2020-Now</p>
    </form>
    <div style="color: #a5b1c2;">
        <p>email : sadmin@system.com <br> password : rahasia</p>
    </div>
</div>

@endsection
