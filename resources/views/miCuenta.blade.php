@section('titulo', 'Modificación de mi cuenta')

@extends('template')

@section('contenido')

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form class="row g-3" action="{{ route('actualizarCuenta', $empleado->id) }}" method="POST">
        @csrf
        <h1> Mi Cuenta: {{ Auth::user()->nombre }} </h1>
        <hr>
        @method('PUT')
        <br>
        <div class="col-md-3">
            <label for="descripcion">Email:</label>
            <input type="text" class="form-control" id="email" name="email"
                value="{{ old('email') ?? $empleado->email }}">
            {!! $errors->first('email', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono"
                value="{{ old('telefono') ?? $empleado->telefono }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion"
                value="{{ old('direccion') ?? $empleado->direccion }} ">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="fechaAlta">Fecha de alta:</label>
            <input type="date" class="form-control" id="fechaAlta" name="fechaAlta"
                value="{{ old('fechaAlta', $empleado->fechaAlta), $empleado->fechaAlta }}">
            {!! $errors->first('fechaAlta', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="row-3">
            <button type="submit" class="btn btn-success"><i class="bi bi-pencil"></i> Actualizar</button>

            @if (Auth::user()->tipo === 0)
                <a class="btn btn-danger" href="{{ route('listaEmpleados', Auth::user()->id) }}"><i
                        class="bi bi-backspace"></i> Volver a empleados</a>
            @endif
            @if (Auth::user()->tipo === 1)
                <a class="btn btn-danger" href="{{ route('listarTareasOperario', Auth::user()->id) }}"><i
                        class="bi bi-backspace"></i> Volver a tareas</a>
            @endif
        </div>

    </form>




@endsection
