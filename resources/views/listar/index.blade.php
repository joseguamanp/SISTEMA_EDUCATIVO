@extends('layouts.principal')
@section('content')
	<div id="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				@foreach($rol as $roles)
					<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
						<div class="card text-gray-dark o-hidden h-100 text-center">
							<div class="card-body" style="height: 150px;">
								<i class="{{$roles->icono}} fa-3x mt-3"></i>
								<div class="card-body-icon">
									<i class="{{$roles->icono}}"></i>
								</div>
								<div class="mt-3">
									<span style="font-size:12px">{{$roles->nombre}}</span>
								</div>
							</div>
							{!! Form::open(['route' =>'roles.store','method'=>'POST']) !!}
							@csrf
							<input type="hidden" name="idrol" value="{{$roles->id}}">
							<div class="text-center">
							<button class="btn btn-primary mb-3 btn-sm">Crear</button>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
