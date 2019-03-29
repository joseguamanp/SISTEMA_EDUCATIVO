@extends('layouts.principal')
@section('content')
<div id="content-wrapper" style="padding-left: 10%; padding-top: 2%;">
	@if (session('status'))
		<div class="alert alert-success col-md-4" role="alert">
			{{ session('status') }}
		</div>
	@endif
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="cargarVistaInfPer();">Información Personal</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" onclick="cargarVistaInfAcayLab();">Información Académica y Laboral Económica</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false" onclick="cargarVistaInfBeca();">Información de Beca</a>
			</li>
		</ul>

		<div class="tab-content" style="padding-top: 2%;">

			<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
				@include('docentes.infPersonal.index')
			</div>

			<div class="tab-pane" class="infAcaLab" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				
			</div>

			<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
				
			</div>
		</div>
	</div>
</div>
@endsection