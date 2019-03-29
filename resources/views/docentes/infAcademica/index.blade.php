@php
if(!isset($_SESSION))
session_start();
@endphp

<div class="container">
  {!! Form::open(['url' => 'docentes/infAcademica', 'method' => 'post']) !!}
  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">
      <label for="lblTipIde">Número de Identificación</label>
    </div>
    <div class="form-group col-md-4">
      <input type="text" class="form-control" name="cedula" value="{{$_SESSION['cedula']}}" readonly>
    </div>
    <div class="form-group col-md-2"></div>
  </div>
        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblNivFor">{{ __('Nivel de Formación:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="nivelForm">
                    <option value="">--Seleccione--</option>
                    @foreach($data['nivFormacion'] as $nivelFormacion)
                        <option value="{{$nivelFormacion->etiqueta}}">{{$nivelFormacion->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">
      <label for="">Fecha de Ingreso a la Institución (IES)</label>
    </div>
    <div class="form-group col-md-4">      
        <div class="input-group">
            <input class="form-control" type="text" id="fecha_ing" onchange="cambiarFormatoFecha('fecha_ing');" required="yes">
            <div class="input-group-append">
                <label class="input-group-text" for="fecha_ing">
                    <i class="fas fa-calendar-alt fa-lg"></i>
                </label>
            </div>
        </div>  
    </div>
    <div class="form-group col-md-2"></div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">{!! Form::label('fecing', 'Fecha de salida de la institución (IES):') !!}</div>
    <div class="form-group col-md-3">
      <input class="form-control" name="fec_sal" id="datepicker3" width="276" required autocomplete="off" /> 
    </div>
    <div class="form-group col-md-3"></div>
  </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Relación laboral con la Institución:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" id="relLab" name="relacionLab">
                    <option value="">---Seleccionar--</option>
                    @foreach($data['relLaboral'] as $relacionLab)
                        <option value="{{$relacionLab->etiqueta}}">{{$relacionLab->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>
  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">
      <label for="lblTipIde">{{ __('Relación laboral con la Institución:') }}</label>
    </div>
    <div class="form-group col-md-4">
      <select class="form-control" id="relLab" name="relacionLab">
        <option value="">---Seleccionar--</option>
        @foreach($data['relLaboral'] as $laboralRel)
          <option value="{{$laboralRel->etiqueta}}">{{$laboralRel->etiqueta}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-2"></div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">
      <label for="lblTipIde">{{ __('Ingreso a la Institución por concurso de méritos y oposición:') }}</label>
    </div>
    <div class="form-group col-md-4">
      <select class="form-control" name="ingresoIns">
        <option value="NO">--Seleccione--</option>
        <option value="SI">SI</option>
        <option value="NO">NO</option>
      </select>
    </div>
    <div class="form-group col-md-2"></div>
  </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Escalafón del docente:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="escaDocen">
                    <option value="">--Seleccione--</option>
                    @foreach($data['escaDocente'] as $escalafonDoc)
                        <option value="{{$escalafonDoc->etiqueta}}">{{$escalafonDoc->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Cargo directivo:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="cargoDirectivo">
                    <option value="0">--Seleccione--</option>
                    @foreach($data['cargoDir'] as $cargoDirectivo)
                        <option value="{{$cargoDirectivo->etiqueta}}">{{$cargoDirectivo->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Tiempo de dedicación:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="tiempoDedi">
                    <option value="0">--Seleccione--</option>
                    @foreach($data['tiemDedicacion'] as $tiemDedicacion)
                        <option value="{{$tiemDedicacion->etiqueta}}">{{$tiemDedicacion->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">
      <label for="lblTipIde">{{ __('Número de asignaturas:') }}</label>
    </div>
    <div class="form-group col-md-4">
      <input type="text" name="numAsignaturas" class="form-control" placeholder="Asignaturas">
    </div>
    <div class="form-group col-md-2"></div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">
      <label for="lblTipIde">Es docente de Técnico Superior  </label>
    </div>
    <div class="form-group col-md-4">
      <select class="form-control" name="docSuperior">
        <option value="NO">--Seleccione--</option>
        <option value="SI">SI</option>
        <option value="NO">NO</option>
      </select>
    </div>
    <div class="form-group col-md-2"></div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">
      <label for="lblTipIde">Está cursando estudios superiores</label>
    </div>
    <div class="form-group col-md-4">
      <select class="form-control" name="cursaEstSup" id="curEstSup" onchange="cursaEstSupe(this);" required>
        <option value=""   data-cursasup="0">--Seleccione--</option>
        <option value="SI" data-cursasup="1">SI</option>
        <option value="NO" data-cursasup="2">NO</option>
      </select>
    </div>
    <div class="form-group col-md-2"></div>
  </div>

    <div id="instCursa" class="form-row" >
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-4">
            <label for="lblTipIde">Institución donde cursa estudios superiores</label>
        </div>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="nombreInst" placeholder="Nombre de Institución"/>
        </div>
        <div class="form-group col-md-2"></div>
    </div>

  <div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
      {!! Form::submit('Enviar', ['class' => 'btn btn-primary ' ] ) !!}
    </div>
  </div>

  <div>
        <input hidden='yes' name="fecha_ingreso" id="fecha_ingreso">  
      </div>
  {!! Form::close() !!}
</div>

