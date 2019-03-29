@extends('layouts.principal')
@section('content')
  <div class="container" style="padding-left: 10%; padding-top: 2%;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información Persona</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Información Académica</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Información de Laboral Económica</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Información de Beca</a>
      </li>
    </ul>

    <div class="tab-content" style="padding-top: 2%;">
      
      <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
        @include('docentes.infPersonal.index',compact('carrera','jornada','tipo','nivel','paralelo'))
      </div>

      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('docentes.infAcademica.index',compact('nivFor','reLab','escDoc','cargo'))
      </div>
      
      <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">

      </div>
      
      <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">

      </div>
    </div>  
</div>
@endsection