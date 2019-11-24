
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
                            <div class="card-body bg-light">
                                <div class="h3 text-center font-weight-bold">
                                    ¡En horabuena!. Registro exitoso, ahora ya formas parte de la plataforma SSP
                                </div>
                                <div class="form-group d-flex flex-column justify-content-center align-items-center">
                                    <div class="col-md-12 d-flex justify-content-around align-items-center">
                                        <a class="btn btn-primary btn-round btn-block" href="{{ route('log') }}">
                                            {{ __('Iniciemos sesión') }}
                                        </a>
                                    </div>
                                </div>
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