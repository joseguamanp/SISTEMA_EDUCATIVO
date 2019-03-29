@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['carreras.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
        					<label>Nombre de Etiqueta</label>
					    	{!!Form::text('nombreCarrera',null,['class'=>'form-control'])!!}
        				</div>
                        <div class="form-group">
                                    <label>Modalidad</label>
                                <select name="modCarrera" class="form-control">
                                    @foreach($moda as $modas)
                                        @if($data->id_modalidad== $modas->id)
                                            <option selected="yes" value="{{$modas->id}}">{{$modas->etiqueta}}</option>
                                        @else
                                            <option value="{{$modas->id}}">{{$modas->etiqueta}}</option>
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