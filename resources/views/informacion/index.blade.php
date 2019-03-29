@extends('layouts.informacion')


@section('personal')
<div class="container">
 
    <div class="justify-content-center">

     {!! Form::open( array('url' =>'informacionGlobal/create' , 'method' => 'POST') )!!}
      @csrf

      <fieldset>

        <!-- Select Basic -->
        <div class="row mt-5">
          <label class="col-md-5 alinear mt-1">Tipo de identificación</label>
          <div class="col-md-4">
            <select class="form-control" name="tipoDocumento" required="yes">
              <option value="">--Seleccione--</option>
              @foreach( $datos['documentos'] as $documento )
                <option value="{{ $documento->etiqueta }}">{{ $documento->etiqueta }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Text input-->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Número de identificación</label>  
          <div class="col-md-4">
            <input type="text" name="numIdentificacion" class="form-control input-md" min="0" required="yes"
            readonly="yes" 
            value="{{ Auth::user()->cedula }}">
          </div>
        </div>

        <!-- Text input-->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Primer apellido</label>  
          <div class="col-md-4">
            <input type="text" name="primerApellido" class="form-control input-md" required="yes"
            readonly="yes"
            maxlength="45"
            value="{{ Auth::user()->apellido }}">
          </div>
        </div>

        <!-- Text input-->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1" for="textinput">Segundo apellido</label>  
          <div class="col-md-4">
            <input type="text" name="segundoApellido" class="form-control input-md" required="yes"
            maxlength="45">
          </div>
        </div>

        <!-- Text input-->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Primer nombre</label>  
          <div class="col-md-4">
            <input type="text" name="primerNombre" class="form-control input-md" required="yes"
            readonly="yes"
            maxlength="45"
            value="{{ Auth::user()->nombre }}">
          </div>
        </div>

        <!-- Text input-->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Segundo nombre</label>  
          <div class="col-md-4">
            <input type="text" name="segundoNombre" class="form-control input-md" required="yes"
            maxlength="45">
          </div>
        </div>

        <!-- Select Basic -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Sexo</label>
          <div class="col-md-4">
            <select class="form-control" name="sexo" required="yes">
              <option value="">--Seleccione--</option>
              @foreach( $datos['sexos'] as $sexo )
                <option value="{{ $sexo->etiqueta }}">{{$sexo->etiqueta}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Género</label>
          <div class="col-md-4">
            <select class="form-control" name="genero" required="yes">
              <option value="">--Seleccione--</option>
              @foreach( $datos['generos'] as $genero)
                <option value="{{ $genero->etiqueta }}"> {{ $genero->etiqueta }} </option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Estado civil</label>
          <div class="col-md-4">
            <select class="form-control" name="estadoCivil" required="yes">
              <option value="">--Seleccione--</option>
              @foreach($datos['estado_civiles'] as $estado_civil)
                <option value="{{ $estado_civil->etiqueta}}"> {{  $estado_civil->etiqueta }} </option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Etnia</label>
          <div class="col-md-4">
            <select class="form-control" name="etnia" required="yes">
              <option value="">--Seleccione--</option>
              @foreach($datos['etnias'] as $etnia)
                <option value="{{ $etnia->etiqueta }}"> {{ $etnia->etiqueta}} </option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- *********************  Select - TIPO DE SANGRE ******************* -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Tipo de sangre</label>
          <div class="col-md-4">
            <select class="form-control" name="tipoSangre" required="yes">
              <option value="">--Seleccione--</option>
              @foreach($datos['tipo_sangres'] as $tipo_sangre)
                <option value="{{ $tipo_sangre->etiqueta}}"> {{  $tipo_sangre->etiqueta }} </option>
              @endforeach
            </select>
          </div>
        </div>


        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Habla algún idioma ancestral</label>
          <div class="col-md-4">
            <select class="form-control" name="hablaIdiomaAnces" id="habla_idioma_an" onclick="setIdiomaAn();" required="yes">
                <option value="">--Seleccione</option>
                <option value="SI"> SI </option>
                <option value="NO"> NO </option>
            </select>
          </div>
        </div>

        <div class="row mt-3" id="contenedor_idioma">
          <label class="col-md-5 alinear mt-1">Idioma ancestral</label>  
          <div class="col-md-4">
            <input type="text" name="idiomaAnces" id="idiomaAnces"class="form-control input-md"
            maxlength="45" 
            required="yes">
          </div>
        </div>

        <!-- *************** input datepicker - FECHA DE NACIMIENTO ************************ -->
        <div class="row mt-3">

          <label class="col-md-5 alinear mt-1">Fecha de nacimiento</label>
          <div class="col-md-4 input-group">
            <input type="text" class="form-control" id="calendario" 
                  placeholder="dd/mm/yyyy"
                  onchange ="cambiarFormato()"
                  required="yes">
            <div class="input-group-append">
              <label class="input-group-text" for="calendario"><i class="fas fa-calendar-alt fa-lg"></i></label>
            </div>
          </div>

        </div>


        <!-- *************** Email input - CORREO ************************ -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Correo electrónico</label>  
          <div class="col-md-4">
            <input type="email" name="correo" class="form-control input-md" min="0" required="yes"
            maxlength="45">
          </div>
        </div>

        <!-- *************** Number input - NUMERO DE CECULAR *************** -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Número de celular</label>  
          <div class="col-md-4">
            <input type="number" name="numCelular" class="form-control input-md" min="0" required="yes"
            maxlength="10" 
            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
          </div>
        </div>

        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Número convencional</label>  
          <div class="col-md-4">
            <input type="number" name="numConvencional" class="form-control input-md" min="0"
            maxlength="10" 
            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
          </div>
        </div>

        <!-- ************* Text input - DIRECCION DOMICILIARIA ********** -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Dirreción domiciliaria</label>  
          <div class="col-md-4">
            <input type="text" name="dirDomiciliaria" class="form-control input-md" min="0" required="yes"
            maxlength="250">
          </div>
        </div>


        <!-- ************* Number input - CODIGO POSTAL ****************** -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Código postal</label>  
          <div class="col-md-4">
            <input type="number" name="codigoPostal" class="form-control input-md" min="0" required="yes"
            maxlength="10" 
            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
          </div>
        </div>



        <!-- ************* Text input - EN CASO DE EMERGENCIA CONTACTAR A********** -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">En caso de emergencia contactar a</label>  
          <div class="col-md-4">
            <input 
                type="text" 
                name="contactoEmergencia" 
                class="form-control input-md"  
                placeholder ="Nombre de un familiar"
                maxlength="150" 
                min="0">
          </div>
        </div>

        
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Parentezco</label>  
          <div class="col-md-4">
            <input type="text" name="parentezco" class="form-control input-md" 
                placeholder="Parentezco del contacto" 
                maxlength="20" 
                min="0">
          </div>
        </div>

        
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Número de contacto</label>  
          <div class="col-md-4">
            <input type="number" name="numContacto" 
            class="form-control input-md" 
            placeholder="Número telefónico del contacto"
            min="0" 
            maxlength="10"
            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
          </div>
        </div>

        <!-- *********************  Select - PAIS DE NACIONALIDAD ******************* -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">País de nacionalidad</label>
          <div class="col-md-4">
            <select  class="form-control" name="paisNacionalidad" required="yes">
              <option value="">--Seleccione--</option>
                @foreach($datos['paises'] as $pais)
                  <option value="{{ $pais->etiqueta }}"> {{  $pais->etiqueta }} </option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Provincia de nacimiento</label>
          <div class="col-md-4">
            <select class="form-control" name="provinciaNacionalidad" required="yes">
              <option value="">--Seleccione--</option>
                @foreach($datos['provincias'] as $provincia)
                  <option value="{{ $provincia->etiqueta }}">{{ $provincia->etiqueta }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Cantón de nacimiento</label>
          <div class="col-md-4">
            <select class="form-control selection wrapper" name="cantonNacionalidad" required="yes">
              <option value="">--Seleccione--</option>
                @foreach($datos['cantones'] as $canton)
                  <option value="{{ $canton->etiqueta }}">{{ $canton->etiqueta }} </option>
                @endforeach
            </select>
          </div>
        </div>

        <!-- ********** Select basic - CATEGORIA MIGRATORIA ******************* -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Categoría migratoria</label>
          <div class="col-md-4">
            <select class="form-control" name="categoriaMigratoria" id="categoriaMigratoria" required="yes" onclick="
            setCatMigratoria()">
              <option value="">--Seleccione--</option>
                @foreach($datos['categoria_migratorias'] as $cat_migra)
                  <option 
                    value="{{ $cat_migra->nombre_categoria }}">{{$cat_migra->nombre_categoria}} 
                  </option>
                @endforeach
            </select>
            <p class="small">Solo para extranjeros, para ecuatorianos seleccione NO APLICA</p>
          </div>
        </div>

        <!--************************* BLOQUE DE CATERGORIA MIGRATORIA *************** -->


        <div id="seccionCatMigratoria">

          <div class="row mt-3">
            <label class="col-md-5 alinear mt-1">País de residencia</label>
            <div class="col-md-4">
              <select class="form-control" name="paisResidencia" id="paisResidencia" required="yes">
                <option value="">--Seleccione--</option>
                @foreach($datos['paises'] as $pais)
                  <option value="{{ $pais->etiqueta }}"> {{  $pais->etiqueta }} </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row mt-3">
            <label class="col-md-5 alinear mt-1">Provincia de residencia</label>
            <div class="col-md-4">
              <select class="form-control" name="provinciaResidencia" id="provinciaResidencia" required="yes">
                <option value="">--Seleccione--</option>
                @foreach($datos['provincias'] as $provincia)
                  <option value="{{ $provincia->etiqueta }}"> {{ $provincia->etiqueta }} </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row mt-3">
            <label class="col-md-5 alinear mt-1">Cantón de residencia</label>
            <div class="col-md-4">
              <select class="form-control" name="cantonResidencia" id="cantonResidencia" required="yes">
                <option value="">--Seleccione--</option>
                @foreach($datos['cantones'] as $canton)
                  <option value="{{ $canton->etiqueta }}"> {{ $canton->etiqueta }} </option>
                @endforeach
              </select>
            </div>
          </div>  

        </div>

        <!--******************* FIN BLOQUE DE CATEGORIA MIGRATORIA ****************-->

        <!-- *************** Select - TIENE DISCAPACIDAD *************** -->
        <div class="row mt-3">
          <label class="col-md-5 alinear mt-1">Tiene discapacidad</label>
          <div class="col-md-4">
            <select class="form-control" name="discapacidad" id="tieneDis" onclick="setDis();" required="yes">
              <option value="">--Seleccione--</option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select>
          </div>
        </div>

        <!--  ***************** BLOQUE PARA DISCAPACIDAD ******************** -->
        
        <div id="seccion_dis">
          <!-- Text input-->
          <div class="row mt-3">
            <label class="col-md-5 alinear mt-1">Porcentaje de discapacidad</label> 
            <div class="col-md-4">
              <input type="number" id="porcentaje_dis" name="porcentajeDis" class="form-control input-md"
              min="0" 
              maxlength="2" 
              oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
              required="yes">
            </div>
          </div>

          <!-- Text input-->
          <div class="row mt-3">
            <label class="col-md-5 alinear mt-1">Nro. Carnet CONADIS</label> 
            <div class="col-md-4">
              <input type="number" id="carnet_conadis" name="numCarnetConadis" class="form-control input-md"
              required="yes">
            </div>
          </div>

          <!-- Select Basic -->
          <div class="row mt-3">
            <label class="col-md-5 alinear mt-1">Tipo de discapacidad</label>
            <div class="col-md-4">
              <select  class="form-control" id="tipo_dis" name="tipoDiscapacidad" required="yes">
                <option value="">--Seleccione--</option>
                @foreach( $datos['tipo_discapacidad'] as $tipo_dis )
                  <option value="{{ $tipo_dis->etiqueta }}">{{ $tipo_dis->etiqueta }}</option>
                @endforeach
              </select>
            </div>
          </div>

        </div>
        <!-- ****************** FIN DEL BLOQUE DE DISCAPACIDAD *************** -->

        <!-- **************************** Button ******************************-->
        <div>
          <div class="row mt-5 justify-content-center">
            <div class="col-md-3">
              {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
          </div>
        </div>

        <input type="text" id="fecha_nac" name="fecha_nac" hidden="yes">

        </fieldset>


      {!! Form::close() !!}
      @include('mensaje.mensajeerror')

        
    </div>

  </div>

	
 
@endsection



@section('academica')
	<br>
	{!! Form::open(['url' => 'informacionGlobal/ifacademica', 'method' => 'POST']) !!}
	<div class="row justify-content-center">
		<div class="col-md-4">
			 <label">Número de identificación</label>
		</div>
        <div class="col-md-4">                                          
            <input id="numeroidentificacion" class="form-control" type="text" name="numero_identificacion" value="{{ auth()->user()->cedula }}" readonly required>                                       
        </div>
	</div><br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Tipo de Colegio</label>
		</div>
		<div class="col-md-4">
			<select name="tipocolegio" class="form-control" required>
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['tipocolegio'] as $colegio)
						<option value="{{$colegio->etiqueta}}">{{$colegio->etiqueta}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Tipo de Bachillerato</label>
		</div>
		<div class="col-md-4">
			<select name="tipobachillerato" class="form-control" required>
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['tipobachillerato'] as $valor)
						<option value="{{$valor->etiqueta}}">{{$valor->etiqueta}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Año de graduación</label>
		</div>
		<div class="col-md-4">
				<input name="aniograduacion" type="number" class="form-control" required>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Posee algún titulo de Educación Superior</label>
		</div>
		<div class="col-md-4">
			<select name="tipotitulosuperior" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['tipotitulosuperior'] as $colegio)
						<option value="{{$colegio}}">{{$colegio}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Epecifique titulo:</label>
		</div>
		<div class="col-md-4">
				<input name="especifiquetitulo" type="text" class="form-control" required>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Fecha en que inicio el estudiante la carrera</label>
		</div>
		<div class="col-md-4">
					<input name="fechainicio" type="date" class="form-control" required>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Fecha de matricula:</label>
		</div>
		<div class="col-md-4">
			<input name="fechamatricula" type="date" class="form-control" required>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Tipo de matricula:</label>
		</div>
		<div class="col-md-4">
			<select name="tipomatricula" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['tipomatricula'] as $colegio)
						<option value="{{$colegio->etiqueta}}">{{$colegio->etiqueta}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Periodo Academico:</label>
		</div>
		<div class="col-md-4">
			<select name="periodo" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['periodo'] as $colegio)
						<option value="{{$colegio->nombre_periodo}}">{{$colegio->nombre_periodo}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Año del Periodo Academico:</label>
		</div>
		<div class="col-md-4">
				<input name="anioperiodo" type="number" class="form-control" required>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Nivel Academico:</label>
		</div>
		<div class="col-md-4">
			<select name="nivelacademico" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['nivelacademico'] as $colegio)
						<option value="{{$colegio->etiqueta}}">{{$colegio->etiqueta}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Paralelo:</label>
		</div>
		<div class="col-md-4">
			<select name="paralelo" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['paralelo'] as $colegio)
						<option value="{{$colegio->etiqueta}}">{{$colegio->etiqueta}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Nombre de la carrera:</label>
		</div>
		<div class="col-md-4">
			<select name="nombrecarrera" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['nombrecarrera'] as $colegio)
						<option value="{{$colegio->nombreCarrera}}">{{$colegio->nombreCarrera}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Titulo que otorga la carrera:</label>
		</div>
		<div class="col-md-4">
			<select name="titulocarrera" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['titulocarrera'] as $colegio)
						<option value="{{$colegio->etiqueta}}">{{$colegio->etiqueta}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Modalidad de carrera:</label>
		</div>
		<div class="col-md-4">
			<select name="modalidadcarrera" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['modalidadcarrera'] as $colegio)
						<option value="{{$colegio->etiqueta}}">{{$colegio->etiqueta}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Jornada de carrera:</label>
		</div>
		<div class="col-md-4">
			<select name="jornadacarrera" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['jornadacarrera'] as $valor)
						<option value="{{$valor->etiqueta}}">{{$valor->etiqueta}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Ha repetido al menos una materia:</label>
		</div>
		<div class="col-md-4">
			<select name="repetidocarrera" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['repetidocarrera'] as $colegio)
						<option value="{{$colegio}}">{{$colegio}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<div class="col-md-4">
				<label>Ha perdido gratuidad:</label>
		</div>
		<div class="col-md-4">
			<select name="perdiogratuidad" class="form-control">
					<option value="">-----------seleccione-------------</option>
					@foreach($academico['perdiogratuidad'] as $colegio)
						<option value="{{$colegio}}">{{$colegio}}</option>
					@endforeach
			</select>
		</div>
	</div> <br>
	<div class="row justify-content-center">
		<button class="btn btn-primary">Enviar</button>
	</div>
	{!! Form::close() !!}
@endsection
@section('economia')
       
   {!! Form::open( array('url' => 'informacionGlobal/createEstuLaboral', 'method' => 'POST') ) !!}
    @csrf  
        <fieldset>

            <!-- Select Basic -->
            <div class="row mt-5">
                <label class="col-md-6 control-label mt-1 text-right">
                    Ha realizado practicas pre profesionales
                </label>
                <div class="col-md-4">
                    <select class="form-control"
                    id='practicasPre'
                    name="haRealizadoPracticasPreprofesionales"
                    onclick="horasPractiasPre()">
                        <option value="">--Seleccione--</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>

            <!-- BLOQUE PRACTICAS PRE-PROFESIONALES -->

            <div id='seccionPra'>

                <div class="row mt-3">
                    <label class="col-md-6 control-label mt-1 text-right">
                        Horas de la última práctica pre profesional que realizó el estudiante
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" id="horasPracticas" 
                        name="nroHorasPracticasPreprofesionalesPorPeriodo"
                        required="yes">
                    </div>
                </div>

                <!-- Text input-->
                <div class="row mt-3">
                    <label class="col-md-6 control-label text-right" for="textinput">
                        Tipo de institución en el que realiza las prácticas pre profesionales
                    </label>  
                    <div class="col-md-4">
                        <select class="form-control" id="entornoInstitucional" 
                        name="entornoInstitucionalPracticasProfesionales"
                        required="yes"> 
                            <option value="">--Seleccione--</option>
                            @foreach( $laboral['tipoColegios'] as $tipoColegio)
                                <option value="{{$tipoColegio->etiqueta}}">
                                    {{$tipoColegio->etiqueta}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="row mt-3">
                    <label class="col-md-6 control-label text-right" for="textinput">
                        Sector económico en el que realizó las prácticas pre profesionales
                    </label>  
                    <div class="col-md-4">
                        <select class="form-control" id="sectorEconomico" name="sectorEconomicoPracticaProfesional"> 
                            <option value="">--Seleccione--</option>
                            @foreach( $laboral['SectorEconomicos'] as $SectorEconomico)
                                <option value="{{$SectorEconomico->etiqueta}}">
                                    {{$SectorEconomico->etiqueta}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- FIN DEL BLOQUE PRACTICAS PREPROFESIONALES-->


            <!-- Text input-->
            <div class="row mt-3">
              <label class="col-md-6 control-label text-right" for="textinput">Ha participado en algun proyecto de Vinculacion con la Sociedad en el Instituto:</label>  
              <div class="col-md-4">
                  <select class="form-control" id="proyectoVinculacion" name="participaEnProyectoVinculacionSociedad" 
                  onclick="alcanceProyectoVinculacion()" 
                  required="yes">
                      <option value="">--Seleccione--</option>
                      @foreach( $laboral['VinculacionSociedads'] as $VinculacionSociedad)
                        <option value="{{$VinculacionSociedad->etiqueta}}">{{$VinculacionSociedad->etiqueta}}</option>
                      @endforeach
                  </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="row mt-3" id="seccionAlcanceProyecto">
                <label class="col-md-6 control-label text-right" for="textinput">Cual es el alcance del proyecto de Vinculacion con la Sociedad</label>  
                <div class="col-md-4">
                    <select class="form-control" id="alcanceProyecto" name="tipoAlcanceProyectoVinculacionId">
                        <option value="">--Seleccione--</option>
                        @foreach( $laboral['AlcanceProyectoVinculacions'] as $AlcanceProyectoVinculacion)
                            <option value="{{$AlcanceProyectoVinculacion->etiqueta}}">
                                {{$AlcanceProyectoVinculacion->etiqueta}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="row mt-3">
                <label class="col-md-6 control-label text-right" for="textinput">
                    El estudiante se encuentra dedicado a
                </label>  
                <div class="col-md-4">
                    <select class="form-control" id="estudianteocupacionId" name='estudianteocupacionId' 
                    onclick="ocupacionLaboral()" 
                    required="yes">
                        <option value="">--Seleccione--</option>
                        @foreach( $laboral['OcupacionEstudiantes'] as $OcupacionEstudiante)
                            <option value="{{$OcupacionEstudiante->etiqueta}}">
                                {{$OcupacionEstudiante->etiqueta}}
                            </option>
                        @endforeach    
                    </select>
                </div>
            </div>

            <!-- BLOQUE DE OCUPACION DEL ESTUDIANTE -->

            <div id="seccionLaboralEstudiante">

                <!-- Text input-->
                <div class="row mt-3">
                    <label class="col-md-6 control-label text-right">
                        Nombre de la empresa donde labora
                    </label>  
                    <div class="col-md-4">
                        <input id="nombreEmpresa" name="nombreEmpresa" class="form-control input-md" required="yes">
                    </div>
                </div>

                <!-- Text input-->
                <div class="row mt-3">
                  <label class="col-md-6 control-label text-right" for="textinput">Sector económico en el que de la empresa en que labora</label>  
                  <div class="col-md-4">
                    <select class="form-control" id="sectorEcoLaboral" name="sectorEcoLaboral" required="yes">
                        <option value="">--Seleccione--</option>
                        @foreach( $laboral['SectorEconomicos'] as $SectorEconomico)
                            <option value="{{$SectorEconomico->etiqueta}}">{{$SectorEconomico->etiqueta}}</option>
                        @endforeach    
                    </select>
                  </div>
                </div>

                <!-- Text input-->
                <div class="row mt-3">
                    <label class="col-md-6 control-label text-right" for="textinput">
                        Para que Emplea sus ingresos economicos el estudiante
                    </label>  
                    <div class="col-md-4">
                        <select class="form-control" id="ingresosEstudiante" name="ingresosEstudiante" required="yes">
                            <option value="">--Seleccione--</option>
                            @foreach( $laboral['EstIngresos'] as $EstIngreso)
                                <option value="{{$EstIngreso->etiqueta}}">{{$EstIngreso->etiqueta}}</option>
                            @endforeach  
                        </select>
                    </div>
                </div>
            </div>
            <!-- FIN DEL BLOQUE OCUPACION DEL ESTUDIANTE -->
            
            <!-- Text input-->
            <div class="row mt-3">
              <label class="col-md-6 control-label text-right" for="textinput">Usted o algun miembro de su familia recibe el bono de desarrollo humano</label>  
                <div class="col-md-4">
                    <select class="form-control" name="bonodesarrolloId" required="yes">
                        <option value="">--Seleccione--</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="row mt-3">
                <label class="col-md-6 control-label text-right" for="textinput">Nivel de formacion del padre</label>
                    <div class="col-md-4">
                        <select class="form-control" name="nivelFormacionPadre" required="yes">
                            <option value="">--Seleccione--</option>
                            @foreach( $laboral['NivelFormacionPadres'] as $NivelFormacionPadre)
                                <option value="{{$NivelFormacionPadre->etiqueta}}">
                                    {{$NivelFormacionPadre->etiqueta}}
                                </option>
                            @endforeach
                        </select>
                  </div>
            </div>

            <!-- Select Basic -->
            <div class="row mt-3">
                <label class="col-md-6 control-label mt-1 text-right">Nivel de formacion de la madre</label>
                <div class="col-md-4">
                    <select class="form-control" name="nivelFormacionMadre" required="yes">
                        <option value="">--Seleccione--</option>
                        @foreach( $laboral['NivelFormacionMadres'] as $NivelFormacionMadre)
                            <option value="{{$NivelFormacionMadre->etiqueta}}">
                                {{$NivelFormacionMadre->etiqueta}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="row mt-3">
                <label class="col-md-6 control-label mt-1 text-right">Ingreso del Hogar:</label>
                <div class="col-md-4">
                    <input name="ingresoTotalHogar" class="form-control input-md" required="yes">
                </div>
            </div>

            <!-- Text input-->
            <div class="row mt-3">
              <label class="col-md-6 control-label text-right">Número de miembros del Hogar</label>  
              <div class="col-md-4">
                <input name="cantidadMiembrosHogar" class="form-control input-md" required="yes">
              </div>
            </div>

            <div class="form-group row mt-5 justify-content-center">
                <div class="col-md-4">
                    <button class="btn btn-primary btn-block mt-3">Enviar</button>
                </div>
            </div>

            <div><input name="id_usu_cre" value='{!! Auth::user()->id !!}' hidden="yes"></div>
            <div><input name="id_usu_mod" value='{!! Auth::user()->id !!}' hidden="yes"></div>

        </fieldset>
    {!! Form::close() !!}
@endsection
@section('beca')
	<div id="content-wrapper">
    <div class="container">
        	<div class="row justify-content-center">        		
				<div class="col-md-8">
					{!! Form::model($beca,['url' => 'informacionGlobal', 'method' => 'POST']) !!}
        				<div class="card">
				            <div class="card-header"><i class="fas fa-table"></i> Datos Beca</div>
				            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-6">Número de identificación</label>
                                    <div class="col-md-6">                                          
                                        <input id="numeroidentificacion" class="form-control" type="text" name="numero_identificacion" value="{{ auth()->user()->cedula }}" readonly required>                                       
                                    </div>
                                </div>
				            	<div class="form-group row">
                                	<label class="col-md-6">Tipo de beca que recibe el estudiante</label>
                                    <div class="col-md-6">
                                        <select id="tipobeca" name="tipo_beca" class="form-control" onclick="razonesbeca();" required>
                                        	<option value="">SELECCIONE</option>
                                           	@foreach($beca['tipobeca'] as $b)
                                                <option value="{{$b->etiqueta}}">{{$b->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            	</div>
                            	<div class="form-group row">
                                	<label class="col-md-6">Primera razón de la beca</label>
                                    <div class="col-md-6">
                                        <select id="primerarazon" name="primera_razon" class="form-control">
                                           	<option value="">SELECCIONE</option>
                                           	@foreach($beca['primerarazonbeca'] as $b)
                                                <option value="{{$b->etiqueta}}">{{$b->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            	</div>
                            	<div class="form-group row">
                                	<label class="col-md-6">Segunda razón de la beca</label>
                                    <div class="col-md-6">
                                        <select id="segundarazon" name="segunda_razon" class="form-control">
                                           <option value="">SELECCIONE</option>
                                           	@foreach($beca['segundarazonbeca'] as $b)
                                                <option value="{{$b->etiqueta}}">{{$b->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            	</div>
                            	<div class="form-group row">
                                	<label class="col-md-6">Tercera razón de la beca</label>
                                    <div class="col-md-6">
                                        <select id="tercerarazon" name="tercera_razon" class="form-control">
                                           <option value="">SELECCIONE</option>
                                           	@foreach($beca['tercerarazonbeca'] as $b)
                                                <option value="{{$b->etiqueta}}">{{$b->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            	</div>
                            	<div class="form-group row">
                                	<label class="col-md-6">Cuarta razón de la beca</label>
                                    <div class="col-md-6">
                                        <select id="cuartarazon" name="cuarta_razon" class="form-control">
                                        	<option value="">SELECCIONE</option>
                                           @foreach($beca['cuartarazonbeca'] as $b)
                                                <option value="{{$b->etiqueta}}">{{$b->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            	</div>
                            	<div class="form-group row">
                                	<label class="col-md-6">Quinta razón de la beca</label>
                                    <div class="col-md-6">
                                        <select id="quintarazon" name="quinta_razon" class="form-control">
                                        	<option value="">SELECCIONE</option>
                                           @foreach($beca['quintarazonbeca'] as $b)
                                                <option value="{{$b->etiqueta}}">{{$b->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            	</div>	    	
                            	<div class="form-group row">
                                	<label class="col-md-6">Sexta razón de la beca</label>
                                    <div class="col-md-6">
                                        <select id="sextarazon" name="sexta_razon" class="form-control">
                                        	<option value="">SELECCIONE</option>
                                           @foreach($beca['sextarazonbeca'] as $b)
                                                <option value="{{$b->etiqueta}}">{{$b->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            	</div>
                            	<div class="form-group row">
                                	<label class="col-md-6">Valor del monto de la beca</label>
                                    <div class="col-md-6">
                                        <input id="montobeca" class="form-control" type="text" name="monto_beca">	
                                    </div>
                            	</div>
                            	<div class="form-group row">
                                	<label class="col-md-6">Porcentaje de la beca que cubre el valor del arancel</label>
                                    <div class="col-md-6">
                                        <input id="valorarancel" class="form-control" type="text" name="porcentaje_beca_arancel">	
                                    </div>
                            	</div>
                            	<div class="form-group row">
                                	<label class="col-md-6">Porcentaje de la beca que cubre la manutención</label>
                                    <div class="col-md-6">
                                        <input id="valormanutencion" class="form-control" type="text" name="porcentaje_beca_manutencion">	
                                    </div>
                            	</div>
                              <div class="form-group row">
                                  <label class="col-md-6">Tipo de financiamiento de la beca</label>
                                    <div class="col-md-6">
                                        <select id="financiamientobeca" name="" class="form-control">
                                           <option value="">SELECCIONE</option>
                                           @foreach($beca['financiamientobeca'] as $b)
                                                <option value="{{$b->etiqueta}}">{{$b->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-6">Valor del monto de la ayuda económica</label>
                                    <div class="col-md-6">
                                        <input id="ayudaeconomica" class="form-control" type="text" name="" required> 
                                    </div>
                              </div>        
                              <div class="form-group row">
                                  <label class="col-md-6">Valor del monto de crédito educativo</label>
                                    <div class="col-md-6">
                                        <input id="creditoeducativo" class="form-control" type="text" name="" required> 
                                    </div>
                              </div>
					    		<div class="form-group row mb-0">
	                                <div class="col-md-4 offset-md-8">
	                                    <button class="btn btn-primary btn-block mt-3">Enviar</button>
	                                </div>
                            	</div>
											           
				            </div>
		          		</div>  <!--fin del card-3 -->		          	
                        {!! Form::close() !!}
                        @include('mensaje.mensajeerror')
        		</div>	         		       		
			</div>
	</div>
</div>
@endsection

