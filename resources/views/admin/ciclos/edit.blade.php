@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['ciclos.update',$data->id],'method'=>'PUT']) !!}

					<div class="form-group">
						<div class="card mb-3">
							<div class="card-header">
								<i class="fas fa-table"></i>
								Ciclos </div>
							<div class="card-body">
								<label>Nombre de Etiqueta</label>
								<input type="text" name="nombre_ciclo" required pattern="[A-Za-zá-úÁ-Ú0-9-? ]+" class="{!!Form::text('nombre_ciclo',null,['class'=>'form-control'])!!}
										</div>
										</div>
                                        <div class="form-group">
								<button class="btn btn-warning btn-block mt-3">Aceptar</button>
							</div>
						</div>
						{!! Form::close() !!}
						@include('mensaje.mensajeerror')
					</div>
        		</div>
        </div>
    </div>
</div>
@endsection