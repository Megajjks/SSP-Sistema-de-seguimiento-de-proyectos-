<!DOCTYPE html>
<html lang="es">
<head>
    <title>Laravel</title>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    
    <!-- CSS Files -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/atlantis.min.css">
    
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
@include('menu')
@yield('content')
</body>

<footer>
</footer>

</html>