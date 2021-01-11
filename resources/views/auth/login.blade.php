<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}" media="screen,projection" />
    @yield('customStyle')
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
</head>

<body class="grey lighten-4">
    <nav>
        <div class="nav-wrapper teal">
          <a href="#" class="brand-logo"><img src="{{ asset('img/anmlogo.gif') }}" height="40" class="mt-1" alt="" srcset=""></a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
          </ul>
        </div>
      </nav>

      <ul class="sidenav teal" id="mobile-demo">
          <div class="background">
              <li><a href="{{ route('login') }}" class="white-text">Login</a></li>
              <li><a href="{{ route('register') }}" class="white-text">Register</a></li>
          </div>
      </ul>

    <div class="container mt-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card mt-5">
                <div class="card-content">
                    <h3 class="teal-text">ITC 2021</h3>
                    <br>
                    <div class="row">
                        <div class="input-field col m12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="username" type="text" name="username" value="{{ old('username') }}" required>
                            <label for="username">Username</label>
                            @error('username')
                            <span class="omrs-input-helper red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                          <div class="input-field col m12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="password" required>
                            <label for="password">Password</label>
                            @error('password')
                            <span class="omrs-input-helper red-text">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>
                      <div class="row">
                        <button type="submit" class="btn btn-large btn-block">
                            {{ __('Login') }}
                        </button>
                      </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        M.AutoInit()
    </script>
</body>

</html>
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
