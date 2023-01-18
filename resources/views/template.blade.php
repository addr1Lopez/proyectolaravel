<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/94d5779c24.js" crossorigin="anonymous"></script>
    <title>@yield('titulo')</title>
    <style>
        body {
            margin: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tevacae S.L</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse show" id="navbarColor02" style="">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="formRegCliente">Registrar un cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formRegEmpleado">Registrar un empleado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formMantCliente">Formulario de mantenimiento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formAñadirTarea">Añadir una tarea / incidencia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listarTareas">Listado de tareas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    @yield('contenido')
</body>

</html>
