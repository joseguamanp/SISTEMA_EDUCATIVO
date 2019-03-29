@php
    if(!isset($_SESSION))
        session_start();
@endphp
<div class="container">
    {!! Form::open(['url' => 'docentes/beca', 'method' => 'post']) !!}

    <div class="form-row">
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-3">
            <label for="lblTipIde">Número de Identificación</label>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="cedula" id="idCedula" value="{{$_SESSION['cedula']}}" readonly/>
        </div>
        <div class="form-group col-md-4"></div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-3">{!! Form::label('beca', 'Posee Beca:') !!}</div>
        <div class="form-group col-md-2">
            <select name="poseeBeca" id="poseeBeca" class="form-control" onchange="cmb_poseeBeca(this,'data-poseebeca','contenedor-beca');">
                <option value="SELECCIONE" data-poseebeca="0">--Seleccione--</option>
                <option value="SI" data-poseebeca="1">SI</option>
                <option value="NO" data-poseebeca="2">NO</option>
            </select>
        </div>
        <div class="form-group col-md-5"></div>
    </div>

    <div id="contenedor-beca">
        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">
                <label for="infopersonal">{{ __('Tipo de Beca que recibe el docente:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select name="tipoBeca" class="form-control">
                    <option value="0">--Seleccione--</option>
                    @foreach($data['tipoBeca'] as $tipoBeca)
                        <option value="{{$tipoBeca->etiqueta}}">{{$tipoBeca->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Valor del monto de la Beca') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="valorBeca" class="form-control" placeholder="$0,00"/>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Tipo de financiamiento de la beca:') !!}</div>
            <div class="form-group col-md-4">
                <select name="tipoFina" class="form-control">
                    <option value="0">--Seleccione--</option>
                    @foreach($data['tipoFinanciamiento'] as $tipoFinanciamiento)
                        <option value="{{$tipoFinanciamiento->etiqueta}}">{{$tipoFinanciamiento->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Realización de publicaciones en revistas científicas indexadas') !!}</div>
            <div class="form-group col-md-2">
                <select name="realizoPub" id="realizoPub" class="form-control" onchange="realizoPublicacion(this)">
                    <option value="SELECCIONE" data-reaPub="0">--Seleccione--</option>
                    <option value="SI" data-reaPub="1">SI</option>
                    <option value="NO" data-reaPub="2">NO</option>
                </select>
            </div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="form-row" id="nroPubRev" style="padding-left: 5%;">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('nroPub', 'Número de publicaciones en revistas científicas indexadas:') !!}</div>
            <div class="form-group col-md-4">
                <input type="number" name="nroPub" class="form-control" placeholder="Número de Publicaciones"/>
            </div>
            <div class="form-group col-md-3"></div>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            {!! Form::submit('Enviar', ['class' => 'btn btn-primary ' ] ) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
