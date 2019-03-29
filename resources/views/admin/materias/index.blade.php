@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['url' => 'admin/materias', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-md-2">
                            <label>Nombre de Materia</label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="etiqueta" required pattern="[A-Za-zá-úÁ-Ú0-9 ]+"/>
                        </div>
                        <div class="col-md-2">
                            <label>Seleccionar el Area </label>
                        </div>      
                        <div class="col-md-3">
                            <select class="form-control" name="id_area_materia" required>
                                <option value="">--Seleccione--</option>
                                @foreach($dataA as $areas)
                                    <option value="{{$areas->id}}">{{$areas->nombre_area}}</option>
                                @endforeach
                            </select>
                        </div>      
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <label>Descripcion</label> 
                        </div>
                        <div class="col-md-5">
                            <textarea class="form-control" type="text" name="descripcion" style="resize: none; max-height: 100%;" required></textarea>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success btn-block">Aceptar</button>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <br>
                        
                    {!! Form::close() !!}
                    @include('mensaje.mensajeerror')
                </div>
        
            </div> 
            <div class="row">
                
                <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                              <i class="fas fa-table"></i>
                              Información de las Materias</div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                        <th>Etiqueta</th>
                                        <th>Area</th>
                                        <th>Descripción</th>
                                        <th>Creado</th>
                                        <th>Modificado</th>
                                        <th>Editar</th>
                                        <th>Estado</th>     
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data as $datas)
                                    <tr>
                                        <td>{{$datas->nombre_materia}}</td>
                                        <td>{{$datas->id_area_materia}}</td>
                                        <td>{{$datas->descripcion}}</td>
                                        <td>{{$datas->fecha_cre}}</td>
                                        <td>{{$datas->fecha_mod}}</td>
                                        <td>
                                            @if($datas->deleted_at!='')
                                                {!!link_to_route('materias.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning disabled']);!!}
                                            @else
                                                {!!link_to_route('materias.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning']);!!}
                                            @endif
                                        </td>
                                        <td>
                                            @if($datas->deleted_at!='')
                                               <a class="btn btn-primary btn-block" href="materias/{{$datas->id}}/restaurar">Restaurar</a>
                                            @else
                                                    {!! Form::open(['route' => ['materias.destroy',$datas->id],'method'=>'DELETE']) !!}
                                                <div class="form-group">
                                                    {!!Form::submit('Desactivar',['class'=>'btn btn-danger btn-block'])!!}
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
                        </div>  <!--fin del card-3 -->
                </div>
            </div>
    </div>
</div>
@endsection