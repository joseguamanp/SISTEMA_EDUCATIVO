@if(count($errors) > 0)
					<div class="alert alert-warning alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Error!</strong> 
					  @foreach($errors->all() as $error)
					  	<li>{!!$error!!} </li>
					  @endforeach
					</div>
@endif