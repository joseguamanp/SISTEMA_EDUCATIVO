@php
    if(!isset($_SESSION))
        session_start();
@endphp

<div class="container">
    {!! Form::open(['url' => 'docentes/provincia', 'method' => 'post']) !!}

    <div class="form-row">
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-3">{!! Form::label('pais', 'Pais Nacionalidad:') !!}</div>
        <div class="form-group col-md-3">
            <select name="pais" id="PAIS" class="form-control" onclick="paises()">
                <option value="0">--Seleccione--</option>
                <option value="1">ECUADOR</option>
                <option value="2">COLOMBIA</option>
            </select>
        </div>
        <div class="form-group col-md-4"></div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-3">{!! Form::label('provincia', 'Provincia de Nacimiento:') !!}</div>
        <div class="form-group col-md-3">
            <select name="provincias" id="provincias" class="form-control" onclick="cantones()">
                <option value="0">--Seleccione--</option>
            </select>
        </div>
        <div class="form-group col-md-4"></div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-3">{!! Form::label('canton', 'Cantón de Nacimiento:') !!}</div>
        <div class="form-group col-md-3">
            <select name="canton" id="canton" class="form-control">
                <option value="0">--Seleccione--</option>
            </select>
        </div>
        <div class="form-group col-md-4"></div>
    </div>


</div>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                {!! Form::submit('Enviar', ['class' => 'btn btn-primary ' ] ) !!}
            </div>
        </div>

    {!! Form::close() !!}
</div>
