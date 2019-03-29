@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['materias.update',$data[0]->id],'method'=>'PUT']) !!}
        				<div class="form-group">
        					<label>Nombre de Materia</label>
					    	<input type="text" name="etiqueta" class="form-control" value="{{$data[0]->nombre_materia}}">
        				</div>

                        <div class="form-group">
                            <label>Area de la Materia</label>
                            <select class="form-control" name="id_area_materia" required>
                                <option value="{{$data[0]->id_area_materia}}">{{$data[0]->nombre_area}}</option>
                                @foreach($area as $areas)
                                    @if($areas->id != $data[0]->id_area_materia)
                                        <option value="{{$areas->id}}">{{$areas->nombre_area}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" type="text" name="descripcion" style="resize: none; max-height: 100%;" required>{{$data[0]->descripcion}}</textarea>
                        </div>

        				<div class="form-group">
                            <button class="btn btn-warning btn-block mt-3">Aceptar</button>
                        </div>
        				
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
        		</div>
        </div>
    </div>
</div>
@endsection