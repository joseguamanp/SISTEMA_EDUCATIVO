<?php $mensaje=Session::get('mensaje'); ?>
	@if(isset($mensaje))
		<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>¡felicidades!</strong>  {{$mensaje}}
		</div>
	@endif