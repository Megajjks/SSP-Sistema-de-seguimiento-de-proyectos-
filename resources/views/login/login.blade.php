<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/settings.css">
    
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="img/icono2.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="/css/demo.css">

    <title>Dashboard User</title>
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
        <div class = "col-md-12 d-flex justify-content-center align-items-center">
            <div class = "col-md-5">
                <div class="font-weight-bold text-logo text-center">
                    SSP
                </div>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo electronico</label>
                        <input type="email" class="form-control input-pill input-solid text-lef" id="emailfast" aria-describedby="emailHelp" placeholder="username@example.com">
                        <small id="emailHelp" class="form-text text-muted">No compartiremos tu correo con nadie mas.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control input-pill input-solid text-lef" id="passwordfast" placeholder="*********">
                    </div>
                    <h5  class="btn btn-secondary btn-round" onclick="myFunction()">Iniciar Sesión</h5>
                    <h5  class="btn btn-secondary btn-border btn-round btn-round">Registrarme</h5>
                </form>
            </div>
            <div class = "col-md-7">
                <img src="img/imgindex.png" class="img-size2">
            </div>
        </div>
    </div>    
</div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!--   Core JS Files   -->
	<script src="js/core/jquery.3.2.1.min.js"></script>
	<script src="js/core/popper.min.js"></script>
	<script src="js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="js/plugin/sweetalert/sweetalert.min.js"></script>

	<!--<script src="js/plantilla.js"></script>-->
	<script src="js/app.js"></script>
    <script>
        function myFunction(){
            const name = document.getElementById("emailfast").value;
            const pas = document.getElementById('passwordfast').value;
            console.log(name);
            if(name == 'jayrosalazar@gmail.com'){
                console.log(name);
                location.href="http://localhost:8000/home";
                console.log('entra al sistema');
            }
            else{
                console.log(name)
                location.href="http://localhost:8000/";
                console.log('NO entra al sistema');
            }
        }
    </script>
    
</body>
</html>