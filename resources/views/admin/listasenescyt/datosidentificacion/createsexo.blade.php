@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <!-- INICIO DE DATOS DE SEXO -->
        <div class="col-md-12">
          <!-- Inicio de Card -->
          <div class="card mb-3">
            <div class="card-header">
              Mantenimiento Sexo
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="etiqueta" class="col-lg-2 col-md-3 col-form-label text-lg-left">
                  Etiqueta
                </label>
                <div class="col-lg-8 col-md-6">
                  {!! Form::text('etiqueta',null,['class'=>'form-control mb-2', 'id' => 'etiqueta'])!!}
                  @include('mensaje.mensajeerror')
                </div>
                <div class="col-lg-2 col-md-3">
                  <button class="btn btn-primary btn-block" onclick="verificarInput('etiqueta','/admin/sexo');">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin de card -->
        </div>
        <!-- FIN DE DATOS DE SEXO -->

        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Opciones
            </div>
            <div class="card-body">
              <div class="table-responsive small">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Etiqueta</th>
                      <th style="width:150px;">Creado</th>
                      <th style="width:150px;">Modificado</th>
                      <th style="width:20px;">Editar</th>
                      <th style="width:30px;">Estado</th>
                    </tr>
                  </thead>
                  <tbody id="datos">
                    @foreach($datos as $datas)
                      <tr style="height:20px">
                        <td>{{$datas->etiqueta}}</td>
                        <td>{{$datas->fecha_cre}}</td>
                        <td>{{$datas->fecha_mod}}</td>
                        <td>
                          @if($datas->deleted_at!='')
                            <input type="button" value="Editar" disabled="yes" class="btn btn-default btn-sm" />
                          @else
                            {!!link_to_route('sexo.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning btn-block btn-sm']);!!}
                          @endif
                        </td>
                        <td>
                          @if($datas->deleted_at!='')
                            <a class="btn btn-primary btn-block btn-sm" href="/admin/sexo/{{$datas->id}}/restaurar">Restaurar</a>
                          @else
                            {!! Form::open(['route' => ['sexo.destroy',$datas->id],'method'=>'DELETE']) !!}
                            <div class="form-group">
                              {!!Form::submit('Desactivar',['class'=>'btn btn-danger btn-block btn-sm'])!!}
                            </div>
                            {!! Form::close() !!}
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>  <!--fin del card-->
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">

  var ruta_global = '{{ url('') }}';

  function headerAjax(){
  	$.ajaxSetup({
    		headers: {
      		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		}
  	});
  }

  function verificarInput(id_input, ruta){
    var data = $('#'+id_input).val();
    var size = data.length;
    if(size != 0 ) ajaxInsert(data, ruta);
  }

  function ajaxInsert(data,ruta){
    var tbody;
    headerAjax();
    $.ajax({
      url: ruta_global+ruta,
      type: 'post',
      data: { 'etiqueta' : data },
      dataType: 'json',
    }).done(function (resultado){
      ajaxMostrar(ruta+'/show');
    }).fail(function (resultado){
      alert('error insert');
    });
  }
  function ajaxMostrar(ruta){
    var tbody;
    headerAjax();
    $.ajax({
      url: ruta_global+ruta,
      type: 'post',
      dataType: 'json',
    }).done(function (resultado){
      $('#datos').empty();
      for(var i = 0; i < 1; i++){
        tbody +="<tr class='small'>";
        tbody +="<td>"+resultado[i].etiqueta+"</td>";
        tbody +="<td>"+resultado[i].fecha_cre+"</td>";
        tbody +="<td>"+resultado[i].fecha_mod+"</td>";
        if(resultado[i].deleted_at != null ){
          tbody +="<td>"+"<button class='btn btn-sm' id='btneditar'>Editar</a>"+"</button>"
          tbody +="<td>"+"<a class='btn btn-primary btn-sm' value="+resultado[i].id+" id='btnestado'>Restaurar</a>"+"</td>"
        } else {
          tbody +="<td>"+"<a class='btn btn-warning btn-sm' value="+resultado[i].id+" id='btneditar'>Editar</a>"+"</td>"
          tbody +="<td>"+"<a class='btn btn-danger btn-sm' value="+resultado[i].id+" onclick="+"ajaxDesactivar(this.value,'/admin/sexo')"+" id='btn_estado'>Desactivar</a>"+"</td>"
        }
        tbody +="</tr>";
        $("#datos").html(tbody);
      }
    }).fail(function (resultado){
      alert('error al mostrar');
    });
  }
  function ajaxDesactivar(idd, ruta){
    var tbody;
    var id = $('#btn_estado').val();
    alert(id+" "+ ruta);
    headerAjax();
    $.ajax({
      url: ruta_global+ruta+'/destroy',
      type: 'post',
      data: { 'id' : id },
      dataType: 'json',
    }).done(function (resultado){
      ajaxMostrar(ruta+'/show');
    }).fail(function (resultado){
      alert('error al desactivar');
    });
  }

  </script>
@endsection
