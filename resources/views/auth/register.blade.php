<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--  <title>{{ config('app.name', 'Laravel') }}</title> -->

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/atlantis.min.css') }}">
        
        <style>
            .img-size2{
                width: 120%;
            }
            .text-logo{
                font-size: 120px;
            }
            .subtext-logo{
                font-size: 40px;
            }
        </style>

    </head>
    <body>
        <div class="wrapper">
            <div class="main-header">
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <div class = "col-md-5">
                        <div class="font-weight-bold text-logo text-center">
                            SSP
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input-pill input-solid text-lef " placeholder="usuario" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-pill input-solid text-lef " placeholder="username@web.com"  name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-pill input-solid text-lef " placeholder="*******" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="form-control input-pill input-solid text-lef " placeholder="*******" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column justify-content-center align-items-center">
                                        <div class="col-md-12 d-flex justify-content-around align-items-center">
                                            <button type="submit" class="btn btn-primary btn-round btn-block">
                                                {{ __('Registrarme') }}
                                            </button>
                                        </div>
                                        <a class="btn btn-link" href="{{ route('log') }}">
                                            {{ __('Ya tengo una cuenta para iniciar sesión') }}
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class = "col-md-7">
                        <img src="{{ asset('img/imgindex.png ') }}" class="img-size2">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

