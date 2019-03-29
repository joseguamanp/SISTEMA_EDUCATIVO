@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
	
		<div class="row">
			@foreach($op as $opcion)
				<div class="col-xl-3 col-sm-3 col-md-3 mb-4">
	              	<div class="card text-gray-dark o-hidden h-100 text-center">
	                
		                <div class="card-body" style="height: 100px;">
			                <div class="card-body-icon">
			                	<i class="fas fa-fw fa-list"></i>
			                </div>
			                <div class="mt-3">{{$opcion->nombre_opcion}}</div>
		                </div> 

	                	<form action="{{$opcion->url}}" method="GET">
	                		<div class="col-md-12 text-center">
	                			<button class="btn btn-primary btn-block mb-3">Crear</button>
	                		</div>
			            </form>

	              	</div>
			    </div>
		     @endforeach   	 	
		</div>

	</div>
</div>
@endsection