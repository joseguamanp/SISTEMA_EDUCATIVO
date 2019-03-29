@extends('layouts.principal')
@section('content') 
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['academicoCarreraCoordinador.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
                      <label>Carreras</label>
                      
                        <select class="form-control" name="id_carrera" required="yes">
                          <option value="">--Seleccione--</option>                          
                          @foreach( $carrera as $carreras )
                            @if($data->id_carrera == $carreras->id)
                                <option value="{{ $carreras->id }}" selected="yes">{{ $carreras->nombreCarrera }}</option>
                              @else
                                <option value="{{ $carreras->id }}">{{ $carreras->nombreCarrera }}</option>
                              @endif
                          @endforeach
                        </select>
               
                    </div>

                                <!-- Select Basic -->
                    <div class="form-group">
                        <label>Docentes</label>
                        <select class="form-control" name="id_docente" required="yes">
                          <option value="">--Seleccione--</option>
                          @foreach( $docente as $docentes )
                            @if($data->id_docente == $docentes->id)
                              <option value="{{ $docentes->id }}" selected="yes">{{ $docentes->primerApellido }} {{ $docentes->segundoApellido }} {{ $docentes->primerNombre }} {{ $docentes->segundoNombre }}</option>
                            @else
                              <option value="{{ $docentes->id }}">{{ $docentes->primerApellido }} {{ $docentes->segundoApellido }} {{ $docentes->primerNombre }} {{ $docentes->segundoNombre }}</option>
                            @endif
                         @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                  <button class="btn btn-sucess btn-block">Aceptar</button>
                </div> 
        				
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
        		</div>
        </div>
    </div>
</div>
@endsection