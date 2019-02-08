
<!DOCTYPE html>
<html lang="pl-PL" class="fullHeight">
<head>
    <title>Framework</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Framework" />
    <meta name="author" content="Damian Komoński">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="{{ asset('public/favicon.ico') }}" />
    <link href="{{ asset('public/css/style.min.css') }}" rel="stylesheet" />
</head>
<body  class="fullHeight">

        <div class="component--signin fullHeight flexCenter">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-12 flex">
                      <div class="component--signin--left">
                        <img src="{{ asset('public/images/logo_white.png') }}">
                      </div>

                      <div class="component--signin--right">
                            @if (Session::has('flash_message_error'))
                            <div class="alert alert-danger"> <i class="icon-close"></i> {!! session('flash_message_error') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            @endif
                            @if (Session::has('flash_message_success'))
                            <div class="alert alert-success"> <i class="icon-check"></i> {!! session('flash_message_success') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            @endif
                        <h4>Przypomnij hasło</h4>
                        <p class="subtitle">Wpisz prawidłowy adres email i odbierz wiadomość z nowym hasłem.</p>

                        <form action="{{ url('resetuj-haslo') }}" method="post"> @csrf
                          <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Wpisz email" name="email">
                          </div>

                          <button class="btn-md btn-primary">Zresetuj hasło</button>
                        </form>

                        <p class="back">Powrót do <a href="{{ url('login') }}">Logowania</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


<script src="{{ asset('public/js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('public/js/popper.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/scripts.js') }}"></script>
</body>
</html>


<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">


                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
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

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
