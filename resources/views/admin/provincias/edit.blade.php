@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['provincias.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
        					<label>Nombre de Provincia</label>
					    	{!!Form::text('etiqueta',null,['class'=>'form-control'])!!}
        				</div>

                        <div class="form-group">
                            <label for="">Nombre de Pais</label>
                            <select name="id_pais" id="id_pais" class="form-control">
                                @foreach($pais as $paises)
                                    @if($paises->id == $data->id_pais)
                                        <option value="{{$paises->id}}" selected="selected">{{$paises->etiqueta}}</option>
                                    @endif
                                    <option value="{{$paises->id}}" >{{$paises->etiqueta}}</option>
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