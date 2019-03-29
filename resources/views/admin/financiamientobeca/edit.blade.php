@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">        		
				<div class="col-md-4">
					{!! Form::model($data,['route' => ['financiamientobeca.update',$data->id],'method'=>'PUT']) !!}
					<div class="form-group">
						<div class="card mb-3">
							<div class="card-header">
								<i class="fas fa-table"></i>
								Tipo de financiamiento de la beca</div>
							<div class="card-body">
							<label>Nombre de Etiqueta</label>
						<input type="text" name="etiqueta" required pattern="[A-Za-zá-úÁ-Ú ]+" class="{!!Form::text('etiqueta',null,['class'=>'form-control'])!!}
								</div>
                                <div class="form-group">
						<button class="btn btn-warning btn-block mt-3">Aceptar</button>
							</div>
						</div>
 					<!-- <div class="card mb-3">
				            <div class="card-header">
				              <i class="fas fa-table"></i>
				              Tipo de financiamiento de la beca</div>
				            <div class="card-body">
				              	<label>Etiqueta</label>
					    		{!!Form::text('etiqueta',null,['class'=>'form-control'])!!}
					    		<button class="btn btn-warning btn-block mt-3">Editar</button>-->

						{!! Form::close() !!}
						@include('mensaje.mensajeerror')
					</div>
			</div>  <!--fin del card-3 -->
		</div>
	</div>
</div>
@endsection