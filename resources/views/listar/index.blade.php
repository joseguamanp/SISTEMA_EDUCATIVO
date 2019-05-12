@extends('layouts.principal')
@section('content')

	<div class="mt-5">
		<div class="container">
			<div class="row">
				@foreach($rol as $roles)
					<div class="col-sm-6 col-md-3">
						<div class="card card-rol text-center o-hidden">
							<div class="card-body what_we_do_figure">
								<i class="{{$roles->icono}} fa-3x mt-3"></i>
								<div class="card-body-icon">
									<i class="{{$roles->icono}}"></i>
								</div>
							</div>
							<h4 class="rol-title pb-4">{{$roles->nombre}}</h4>
							{!! Form::open(['route' =>'roles.store','method'=>'POST']) !!}
							@csrf
							<input type="hidden" name="idrol" value="{{$roles->id}}">
							{!! Form::close() !!}
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
	$('.card-rol').click(function(){
		//codigo para manejar el click en el div
	})
	</script>
@endsection
