@section('titulo', 'Modificación del empleado')

@extends('template')

@section('contenido')

    <form id="form" class="row g-3" method="POST" action="{{ route('formularioPass') }}">
        @csrf
        <h1>Recuperación de contraseña</h1>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <h3>Indique su correo electrónico para enviar un correo de Recuperación:</h3>

        <div class="col-md-4">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}"
                placeholder="Correo electrónico">
            {!! $errors->first('email', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-12">
            <button class="btn btn-success" type="submit">Enviar correo</button>
            <a class="btn btn-danger" href="{{ route('login') }}"><i class="bi bi-backspace"></i> Volver al login</a>

        </div>
    </form>

@endsection
