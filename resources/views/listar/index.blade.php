@extends('layouts.principal')
@section('content') 
<div id="content-wrapper">
	
    <div class="container-fluid">
		<div class="row">
			@foreach($rol as $roles)
				<div class="col-xl-3 col-sm-4 col-md-4 mb-4">
	            	<div class="card text-gray-dark o-hidden h-100 text-center">
		                <div class="card-body" style="height: 150px;">
		                	<i class="{{$roles->icono}} fa-3x mt-3"></i>
	                		<div class="card-body-icon">
	                    		<i class="{{$roles->icono}}"></i>
	                  		</div>
		                	<div class="mt-3">{{$roles->nombre}}</div>
		                </div>
		                
						{!! Form::open(['route' =>'roles.store','method'=>'POST']) !!}  
						@csrf
			                <input type="hidden" name="idrol" value="{{$roles->id}}">
			                <div class="col-md-12 text-center">
			                	<button class="btn btn-primary btn-block mb-3">Crear</button>
			                </div> 
						{!! Form::close() !!}            
		        	</div>
		        </div>
			@endforeach

		</div>
		<div class="row">
			@foreach($lista as $lis)
				@if($lis->escalon>0)
					@if($lis->escalon==$lis->id)
					<div class="col-md-3">
						<p class="text-primary">{{$lis->nombre}}</p>
					</div>
					<?php $valor=$lis->id ?>
					@else
						@if($lis->escalon==$valor && $lis->escalon!=$lis->id)
						<a data-toggle="collapse" href="#op-generales">{{$lis->nombre}}
                        	<i id="caret" class="fas fa-caret-down text-right"></i>
                      	</a>
						@else
						<div id="op-generales" class="panel-collapse collapse">
                        	<div class="panel-body">
                          		<ul class="nav navbar-nav" id="nivel-3">
                            		<li>
                              			<a tabindex="-1" href="{!!URL::to('$lis->rutas');!!}">{{$lis->nombre}}</a>
                            		</li>
                            	</ul>
                            </div>
                        </div>
						@endif
					@endif
				@endif
			@endforeach
		</div>
	</div>
</div>
@endsection