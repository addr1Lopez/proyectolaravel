{{-- <!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Login</title> --}}

{{-- <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="../../Assets/css/login.css" th:href="@{../../Assets/css/login.css}"> --}}

{{-- <style>
        body {
            background-image: url('{{ asset('img/fondo.jpg') }}');
            background-size: cover;
            background-position: center;
        }
    </style>

</head>
<body>

    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <form action="{{ route('login') }}" method="post" class="col-12" >
                    @csrf
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="email"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login </button>
                </form>
                <div class="col-12 forgot">
                    <input type="checkbox" name="recordar">
                    <label>Recordar usuario</label>
                </div>
    
		        </div>
            </div>
        </div>
    </div>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="../../Assets/css/login.css" th:href="@{../../Assets/css/login.css}">
</head>
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    body{
        background-color:beige;
    }
</style>

<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h1>Inicio de Sesión</h1>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Email -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Correo electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Correo electrónico"/>
                        </div>

                        <!-- Password -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Contraseña:</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Contraseña"/>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                {{-- <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                    checked />
                                <label class="form-check-label" for="form1Example3"> Recuérdame </label> --}}
                            </div>
                            <a href="{{ route('formularioTareaClientes') }}">Añadir tarea como cliente</a>
                            <br><br>
                            <a href="{{ route('formularioPass') }}">Recuperar contraseña</a>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar sesión</button>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">O</p>
                        </div>

                        <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!"
                            role="button">
                            <i class="fab fa-facebook-f me-2"></i> Continuar con Facebook
                        </a>
                        <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!"
                            role="button">
                            <i class="fab fa-twitter me-2"></i> Continuar con Twitter</a>

                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
