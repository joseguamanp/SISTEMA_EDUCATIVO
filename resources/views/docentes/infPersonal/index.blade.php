@php
        if(!isset($_SESSION))
            session_start();
            
@endphp    
<!--nombre archivo .js => infDocente.js -->
<div class="container">
    {!! Form::open(['url' => 'docentes/personal', 'method' => 'post']) !!}

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">
                <label for="infopersonal">{{ __('Tipo de Identificación:') }}</label>
            </div>
            <div class="form-group col-md-3">
                <select name="tipoDocumento" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($data['tipoDocumento'] as $tipoDoc)
                        <option value="{{$tipoDoc->id}}">{{$tipoDoc->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Número de Identificación') !!}</div>
            <div class="form-group col-md-3">
                <input type="text" name="cedula" class="form-control" value="{{$_SESSION['cedula']}}" readonly >
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3"><label for="infopersonal">{{ __('Sexo:') }}</label></div>
            <div class="form-group col-md-3">
                <select name="sexo" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($data['sexo'] as $sexos)
                        <option value="{{$sexos->id}}">{{$sexos->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3"><label for="infopersonal">{{ __('Género:') }}</label></div>
            <div class="form-group col-md-3">
                <select name="genero" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($data['genero'] as $genero)
                        <option value="{{$genero->id}}">{{$genero->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Primer Apellido') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="primerApellido" placeholder="Primer Apellido" class="form-control" readonly value="{{$_SESSION['priApellido']}}" >
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Segundo Apellido') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="segundoApellido" placeholder="Segundo Apellido" class="form-control" readonly value="{{$_SESSION['segApellido']}}"/>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Primer Nombre') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="primerNombre" placeholder="Primer Nombre" class="form-control" readonly value="{{$_SESSION['priNombre']}}">
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Segundo Nombre') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="segundoNombre" placeholder="Segundo Nombre" class="form-control" readonly value="{{$_SESSION['segNombre']}}">
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Correo Electronico') !!}</div>
            <div class="form-group col-md-4">
                <input type="email" name="correo" class="form-control" required placeholder="example@itsvr.edu.ec">
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Numero Celular:') !!}</div>
            <div class="form-group col-md-2">
                <input type="number" name="numCelular" placeholder="Nro. Celular" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Numero Convencional:') !!}</div>
            <div class="form-group col-md-2">
                <input type="text" name="numDomicilio" placeholder="Nro. Docimicilio" class="form-control" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('dirDom', 'Dirección Domiciliaria:') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="dirDomiciliaria" placeholder="Dirección" class="form-control" required>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('codPostal', 'Código Postal:') !!}</div>
            <div class="form-group col-md-4">
                <input type="number" name="codPostal" placeholder="Codigo Postal" class="form-control" required>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('contacEmer', 'En caso de emergencia contactar a:') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="contEmer" placeholder="Nombre Contacto" class="form-control" required>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('parentezco', 'Parentezco:') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="parent" placeholder="Parentesco" class="form-control" required>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('nroContacto', 'Número de Contacto:') !!}</div>
            <div class="form-group col-md-2">
                <input type="number" name="nroCont" placeholder="Numero Telefono" class="form-control" required>
            </div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('etnia', 'Etnia:') !!}</div>
            <div class="form-group col-md-4">
                <select name="etnia" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($data['etnia'] as $etnia)
                        <option value="{{$etnia->id}}">{{$etnia->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('idiAnce', 'Habla algún idioma ancestral:') !!}</div>
            <div class="form-group col-md-2">
                <select name="hab_idi" id="hab_idi" class="form-control" onchange="hablaIdiomaAncestral(this,'hab_idi');" required>
                    <option value="" data-hab_idi="0">--Seleccione--</option>
                    <option value="SI" data-hab_idi="1">SI</option>
                    <option value="NO" data-hab_idi="2">NO</option>
                </select>
            </div>
            <div class="form-group col-md-5"> </div>
        </div>

        <div class="form-row" id="idiAnce">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('idioAnce', 'Idioma ancestral:') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="nomIdi" placeholder="Idioma Ancestral" class="form-control">
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('fecNac', 'Fecha de nacimiento:') !!}</div>
            <div class="form-group col-md-3">
                <input class="form-control" name="fec_nac" id="datepicker1" width="276" onchange="obtenerEdad();" required autocomplete="off" />
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('edad', 'Edad:') !!}</div>
            <div class="form-group col-md-2"><input type="text" id="edad" class="form-control" readonly></div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('tipSangre', 'Tipo de Sangre:') !!}</div>
            <div class="form-group col-md-3">
                <select name="tipoSangre" id="" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($data['tipoSangre'] as $tipoSangre)
                        <option value="{{$tipoSangre->id}}">{{$tipoSangre->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('pais', 'Pais Nacionalidad:') !!}</div>
            <div class="form-group col-md-3">
                <select name="pais" id="pais" class="form-control" onchange="paises(this,'provincias','pais')" required>
                    <option value="" data-pais="0">--Seleccione--</option>
                    @foreach($data['nacionalidad'] as $nacionalidad)
                        <option value="{{$nacionalidad->id}}" data-pais="{{$nacionalidad->id}}">{{$nacionalidad->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('provincia', 'Provincia de Nacimiento:') !!}</div>
            <div class="form-group col-md-3">
                <select name="provincias" id="provincias" class="form-control" onchange="cantones(this,'canton','provincias')" required>
                    <option value="" data-provincias="0">--Seleccione--</option>
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('canton', 'Cantón de Nacimiento:') !!}</div>
            <div class="form-group col-md-3">
                <select name="canton" id="canton" class="form-control" required>
                    <option value="">--Seleccione--</option>
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('catMigra', 'Categoria Migratoria:') !!}</div>
            <div class="form-group col-md-3">
                <select name="catMigratoria" id="catMigratoria" class="form-control" onchange="cateMigratoria(this);" required>
                    <option value="" data-migratoria="0">--Seleccione--</option>
                    @foreach($data['categoriaMigratoria'] as $cat)
                        <option value="{{$cat->id}}" data-migratoria="{{$cat->id}}">{{$cat->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div id="contenedorMigratorio" style="padding-left: 5%;">
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('paisRes', 'Pais de residencia:') !!}</div>
                <div class="form-group col-md-3">
                    <select name="paisResi" id="paisResi" class="form-control" onchange="paises(this,'provResi','paisResi');">
                        <option value="" data-paisResi="0">--Seleccione--</option>
                        @foreach($data['nacionalidad'] as $nacionalidad)
                            <option value="{{$nacionalidad->id}}" data-paisResi="{{$nacionalidad->id}}">{{$nacionalidad->etiqueta}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('provRes', 'Provincia de residencia:') !!}</div>
                <div class="form-group col-md-3">
                    <select name="provResi" id="provResi" class="form-control" onchange="cantones(this,'cantResi','provResi');">
                        <option value="" data-provResi="0">--Seleccione--</option>
                    </select>
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('canvRes', 'Cantón de residencia:') !!}</div>
                <div class="form-group col-md-3">
                    <select name="cantResi" id="cantResi" class="form-control">
                        <option value="" data-cantResi="0">--Seleccione--</option>
                    </select>
                </div>
                <div class="form-group col-md-4"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('estCiv', 'Estado Civil:') !!}</div>
            <div class="form-group col-md-3">
                <select name="estCivil" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($data['estadocivil'] as $estadoCiv)
                        <option value="{{$estadoCiv->id}}">{{$estadoCiv->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('tieDisca', 'Tiene discapacidad:') !!}</div>
            <div class="form-group col-md-2">
                <select name="tDisc" id="tDisc" class="form-control" onchange="discapacidad(this);" required>
                    <option value="" data-discapacidad="0">--Seleccione--</option>
                    <option value="SI" data-discapacidad="1">SI</option>
                    <option value="NO" data-discapacidad="2">NO</option>
                </select>
            </div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="discapacidad" style="padding-left: 5%;">
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('porDisc', 'Porcentaje de Discapacidad:') !!}</div>
                <div class="form-group col-md-2">
                    <input type="number" name="porDis" placeholder="Porcentaje" class="form-control">
                </div>
                <div class="form-group col-md-5"></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('nroConadis', 'No. Carnet del CONADIS:') !!}</div>
                <div class="form-group col-md-2">
                    <input type="number" name="nroCona" placeholder="Numero" class="form-control">
                </div>
                <div class="form-group col-md-5"></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('tipDisc', 'Tipo de Discapacidad:') !!}</div>
                <div class="form-group col-md-3">
                    <select name="tipoDis" class="form-control">
                        <option value="">--Seleccione--</option>
                        @foreach($data['tipoDiscapacidad'] as $tipoDisca)
                            <option value="{{$tipoDisca->id}}">{{$tipoDisca->etiqueta}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4"></div>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('tipEnfCat', 'Tipo de enfermedad catastrofica:') !!}</div>
            <div class="form-group col-md-3">
                <select name="tipoEnfeCatas" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($data['tipoEnfCatas'] as $tipoEnfermedadCast)
                        <option value="{{$tipoEnfermedadCast->id}}">{{$tipoEnfermedadCast->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                {!! Form::submit('Enviar', ['class' => 'btn btn-primary ' ] ) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] { -moz-appearance:textfield; }
</style> 