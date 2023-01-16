@section('titulo','Formulario de registro de cliente')

@extends('template')

@section('contenido')

<h1> Formulario de registro de cliente: </h1>

<form class="row g-3" method="post" action="{{route('formRegCliente')}}">
    @csrf
    <div class="col-md-3">
        <label for="validationDefault01" class="form-label">CIF:</label>
        <input type="text" class="form-control" name="cif" placeholder="CIF">
        {!! $errors->first('cif','<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault02" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        {!! $errors->first('nombre','<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-3">
        <label for="validationDefaultUsername" class="form-label">Correo:</label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" class="form-control" name="correo" placeholder="Correo" aria-describedby="inputGroupPrepend2">
        </div>
        {!! $errors->first('correo','<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault03" class="form-label">Teléfono:</label>
        <input type="text" class="form-control" name="telefono" placeholder="Teléfono">
        {!! $errors->first('telefono','<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault04" class="form-label">Cuenta corriente:</label>
        <input type="text" class="form-control" name="cuenta" placeholder="Cuenta corriente">
        {!! $errors->first('cuenta','<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault05" class="form-label">Pais:</label>
        <select class="form-select" name="paises">
            @foreach ($paises as $pais)
            @if ($pais->nombre_moneda != null)
            <option value="{{ $pais -> nombre}}">{{ $pais -> nombre }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="validationDefault06" class="form-label">Moneda:</label>
        <select class="form-select" name="paises">
            <?php $monedasMostradas = array(); ?>
            @foreach ($paises as $pais)
            @if ($pais->nombre_moneda == null)
            @else
            @if (!in_array($pais->nombre_moneda, $monedasMostradas))
            <?php array_push($monedasMostradas, $pais->nombre_moneda); ?>
            <option value="{{ $pais->nombre_moneda }}">{{ $pais->nombre_moneda }}</option>
            @endif
            @endif
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="validationDefault07" class="form-label">Importe cuota mensual:</label>
        <input type="text" class="form-control" name="cuota" placeholder="Importe cuota mensual">
        {!! $errors->first('cuota','<span style="color: red;">:message</span>')!!}
    </div>


    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enviar</button>
    </div>
</form>












@endsection