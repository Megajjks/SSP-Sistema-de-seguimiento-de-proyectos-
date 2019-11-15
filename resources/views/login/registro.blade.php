@extends ('master')
@section('content')
<div class = "col-md-12 d-flex justify-content-center align-items-center">

<!-- div class="col-md-6 col-sm-6 col-xs-12"-->
    <div class="login-area">
        <!--  <div class="bg-image"> -->
        
            <div class="login-signup">
                <div class="container">
                    <!--  <div class="login-header"> -->
                        <div class="row">
                            <div class="col-md-5">
                             <!-- LOGO IMG   
                            <div class="login-logo">
                                    <img src="img/img1.png" alt="SSP_logo" class="img-responsive">
                                </div>  --> <!--  -->
                            </div>
                            <div class="col-md-5">
                                <div class="login-details">
                                    <ul class="nav nav-tabs navbar-right">
                                        <li><a data-toggle="tab" href="#register">Registro</a></li>
                                        <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    <!--</div>   -->




                    <div class="tab-content">
                        <div id="register" class="tab-pane fade in">
                            <div class="login-inner">
                                <div class="title">
                                    <h1>SSP</h1>
                                    <h3>Registro</h3>
                                </div>
                                <div class="login-form">
                                    @include('error')
                                    <form action="{{url('/registrar')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-details">
                                            <label class="nombre">
                                                <input type="text" name="nombre" placeholder="Nombre" id="nombre">
                                            </label>
                                            <label class="APaterno">
                                                <input type="text" name="APaterno" placeholder="Primer apellido" id="APaterno">
                                            </label>
                                            <label class="AMaterno">
                                                <input type="text" name="AMaterno" placeholder="Segundo Apellido" id="AMaterno">
                                            </label>
                                            <label class="email">
                                                <input type="email" name="email" placeholder="Ejemplo@web.com" id="email">
                                            </label>
                                            <label class="password">
                                                <input type="password" name="password" placeholder="Contraseña" id="password">
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn" >Aceptar</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div id="login" class="tab-pane active ">
                            <div class="login-inner">
                                <div class="title">
                                    <h1>SPP</h1>
                                    <h3>Login</h3>
                                </div>
                                <div class="login-form">
                                    <form method="post" action="{{url('/verificar')}}">
                                        {{csrf_field()}}
                                        <div class="form-details">
                                            <label class="user">
                                                <input type="email" name="email" placeholder="Ejemplo@web.com" id="email">
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="password" placeholder="Contraseña" id="password">
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn">Aceptar</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
                
            </div>
        
       <!--  </div> -->
       
    </div>
    <div class = "col-md-7">
                <img src="img/img1.png" class="img-size2">
            </div>
</div>
@stop