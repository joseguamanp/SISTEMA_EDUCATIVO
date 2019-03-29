@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['cantones.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
        					<label>Nombre de Etiqueta</label>
					    	{!!Form::text('etiqueta',null,['class'=>'form-control'])!!}
        				</div>

                        <div class="form-group">
                            <label for="">Nombre de Pais</label>
                            <select name="id_provincia" id="id_provincia" class="form-control">
                                @foreach($provincias as $provincia)
                                    @if($provincia->id == $data->id_provincia)
                                        <option value="{{$provincia->id}}" selected="selected">{{$provincia->etiqueta}}</option>
                                    @endif
                                    <option value="{{$provincia->id}}" >{{$provincia->etiqueta}}</option>
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