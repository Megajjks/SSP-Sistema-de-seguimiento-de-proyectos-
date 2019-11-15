@extends ('master')
@section('content')
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
                <img src="img/img1.png" class="img-size2">
            </div>
        </div>
    </div>    
</div>
@stop 