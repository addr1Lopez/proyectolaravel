@section('titulo', 'Añadir una tarea / incidencia:')

@extends('template')

@section('contenido')

    <h1> Añadir una tarea / incidencia: </h1>

    <form class="row g-3" method="post" action="{{ route('formAñadirTarea') }}">
        @csrf
        <div class="col-md-3">
            <label for="nif_cif" class="form-label">NIF / CIF</label>
            <input type="text" class="form-control" name="nif_cif" placeholder="Concepto">
            {!! $errors->first('nif_cif', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="persona" class="form-label">Persona de contacto:</label>
            <input type="text" class="form-control" name="persona" placeholder="Nombre, Apellidos">
            {!! $errors->first('persona', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción">
            {!! $errors->first('descripcion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefaultUsername" class="form-label">Correo:</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" name="correo" placeholder="Correo"
                    aria-describedby="inputGroupPrepend2">
            </div>
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="direccion" placeholder="Dirección">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="poblacion" class="form-label">Población:</label>
            <input type="text" class="form-control" name="poblacion" placeholder="Población">
            {!! $errors->first('poblacion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="codigoPostal" class="form-label">Código postal:</label>
            <input type="text" class="form-control" name="codigoPostal" placeholder="Código postal">
            {!! $errors->first('codigoPostal', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="provincia" class="form-label">Provincia</label>
            <input type="text" class="form-control" name="provincia" placeholder="Provincia">
            {!! $errors->first('provincia', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="operario" class="form-label">Operario</label>
            <input type="text" class="form-control" name="poblacion" placeholder="Operario">
            {!! $errors->first('poblacion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" name="estado" placeholder="Estado">
            {!! $errors->first('estado', '<span style="color: red;">:message</span>') !!}
        </div>

        <div class="col-md-3">
            <label for="fecha" class="form-label">Fecha de realización:</label>
            <input type="text" class="form-control" name="fecha" placeholder="Fecha de realización">
            {!! $errors->first('fecha', '<span style="color: red;">:message</span>') !!}
        </div>
        
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
