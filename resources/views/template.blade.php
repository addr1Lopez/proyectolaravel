<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/94d5779c24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>@yield('titulo')</title>

    @yield('linkScript')
</head>


<style>
    .cuerpo {
        margin: 1.5em;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info" style="font-weight: bold;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tevacae S.L <i class="bi bi-buildings-fill"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse show" id="navbarColor02" style="">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Auth::check() && Auth::user()->tipo === 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Registros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('formularioTarea') }}">Insertar una tarea /
                                    incidencia</a>
                                <a class="dropdown-item" href="{{ route('formularioCliente') }}">Registrar un
                                    cliente</a>
                                <a class="dropdown-item" href="{{ route('formularioEmpleado') }}">Registrar un
                                    empleado</a>
                                <a class="dropdown-item" href="{{ route('formularioRemesa') }}">Formulario Remesa
                                    Mensual</a>
                                <a class="dropdown-item" href="{{ route('formularioCuota') }}">Formulario Cuota
                                    Excepcional</a>
                            </div>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->tipo === 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listaTareas') }}">Lista de tareas</a>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->tipo === 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Listados
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('listaTareas') }}">Lista de tareas</a>
                                <a class="dropdown-item" href="{{ route('listaEmpleados') }}">Lista de empleados</a>
                                <a class="dropdown-item" href="{{ route('listaClientes') }}">Lista de clientes</a>
                                <a class="dropdown-item" href="{{ route('listaCuotas', 'fechaEmision') }}"> Lista de
                                    cuotas</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div>
            @if (Auth::check())
                <p style="margin-left: 10%;">
                    <b>Nombre:</b>
                    <a style="text-decoration:none; color:inherit" href="{{ route('editarCuenta', Auth::user()->id) }}">{{ Auth::user()->nombre }}</a> |
                    <b>Rol:</b>
                    @if (Auth::user()->tipo === 1)
                        Operario</i> |
                    @endif
                    @if (Auth::user()->tipo === 0)
                        Administrador |
                    @endif
                    <b>Sesión:</b>
                    {{ session('hora_login') }} 🕓
                    <a href="{{ route('logout') }}" class="btn btn-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </p>

            @endif
        </div>

    </nav>
    <div class="cuerpo">
        @yield('contenido')
    </div>

    <footer class="bg-info text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!"
                    role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!"
                    role="button"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!"
                    role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!"
                    role="button"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!"
                    role="button"><i class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!"
                    role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Adrian Lopez Gomez
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>
