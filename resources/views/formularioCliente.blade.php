@section('titulo', 'Formulario de registro de cliente')

@extends('template')

@section('contenido')

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form id="formulario" class="row g-3" method="post" action="{{ route('formularioCliente') }}">
        @csrf
        <h1> Formulario de registro de cliente: </h1>
        <hr>
        <div class="col-md-3">
            <label for="validationDefault01" class="form-label">CIF:</label>
            <input type="text" class="form-control" name="cif" placeholder="CIF" value="{{ old('cif') }}">
            {!! $errors->first('cif', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault02" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
            {!! $errors->first('nombre', '<span style="color: red;">:message</span>') !!}
        </div>

        <div class="col-md-3">
            <label for="validationDefaultUsername" class="form-label">Correo:</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" name="correo" placeholder="Correo"
                    aria-describedby="inputGroupPrepend2" value="{{ old('correo') }}">
            </div>
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>

        <div class="col-md-3">
            <label for="validationDefault03" class="form-label">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>

        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Cuenta corriente:</label>
            <input type="text" class="form-control" name="cuenta" placeholder="Cuenta corriente"
                value="{{ old('cuenta') }}">
            {!! $errors->first('cuenta', '<span style="color: red;">:message</span>') !!}
        </div>

        <div class="col-md-3">
            <label for="validationDefault07" class="form-label">Importe cuota mensual:</label>
            <input type="text" class="form-control" name="importe" placeholder="Importe cuota mensual"
                value="{{ old('importe') }}">
            {!! $errors->first('cuota', '<span style="color: red;">:message</span>') !!}
        </div>

        <div class="col-md-3">
            <label for="paises_id" class="form-label">Pais:</label>
            <select class="form-select" name="paises_id">
            @foreach ($paises as $pais)
              <option value="{{ $pais->id }}" {{ old('paises_id') == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
            @endforeach
          </select>
        </div>
        

        <div class="col-md-3">
            <label for="moneda" class="form-label">Moneda:</label>
            <select class="form-select" name="moneda">
                <?php $monedasMostradas = []; ?>
                @foreach ($paises as $pais)
                    @if ($pais->nombre_moneda == null)
                    @else
                        @if (!in_array($pais->nombre_moneda, $monedasMostradas))
                            <?php array_push($monedasMostradas, $pais->nombre_moneda); ?>
                            <option value="{{ $pais->iso_moneda }}">{{ $pais->nombre_moneda }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>


        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar</button>
            <a class="btn btn-danger" href="{{ route('listaClientes') }}"><i class="bi bi-backspace"></i> Volver a clientes</a>
        </div>
    </form>
@endsection
