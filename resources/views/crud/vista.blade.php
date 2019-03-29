@extends('layouts.app');
@php use Illuminate\Support\Collection;
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Vista') }} </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('man') }}" aria-label="{{ __('Vista') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="ModaCarr" class="col-sm-4 col-form-label text-md-right">{{ __('Modalidad de la carrera') }}</label>

                                    <div class="col-md-6">
                                        <select name="modalidad" class="form-control">
                                            @foreach($carrera as $car)
                                                <option value="">{{$car->etiqueta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="JornCarr" class="col-sm-4 col-form-label text-md-right">{{ __('Jornada de la carrera') }}</label>

                                <div class="col-md-6">
                                    <select name="Jornada_Carrera" class="form-control">
                                        @foreach($jornada as $jor)
                                            <option value="">{{$jor->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="TipoMatr" class="col-sm-4 col-form-label text-md-right">{{ __('Tipo de Matricula') }}</label>

                                <div class="col-md-6">
                                    <select name="Tipo_Matricula" class="form-control">
                                        @foreach($tipo as $tip)
                                            <option value="">{{$tip->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="NiveAcad" class="col-sm-4 col-form-label text-md-right">{{ __('Nivel académico') }}</label>

                                <div class="col-md-6">
                                    <select name="Nivel Academico" class="form-control">
                                        @foreach($nivel as $niv)
                                            <option value="">{{$niv->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('Paralelo') }}</label>

                                <div class="col-md-6">
                                    <select name="paralelo" class="form-control">
                                        @foreach($paralelo as $par)
                                            <option value="">{{$par->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--LEYNER-->

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('ingreso') }}</label>

                                <div class="col-md-6">
                                    <select name="ingreso" class="form-control">
                                        @foreach($ingreso as $ing)
                                            <option value="">{{$ing->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('pension') }}</label>

                                <div class="col-md-6">
                                    <select name="pension" class="form-control">
                                        @foreach($pension as $pen)
                                            <option value="">{{$pen->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('Gratuidad') }}</label>

                                <div class="col-md-6">
                                    <select name="gratuidad" class="form-control">
                                        @foreach($gratuidad as $gra)
                                            <option value="">{{$gra->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('ocupacion') }}</label>

                                <div class="col-md-6">
                                    <select name="ocupacion" class="form-control">
                                        @foreach($ocupacion as $ocu)
                                            <option value="">{{$ocu->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('practicas') }}</label>

                                <div class="col-md-6">
                                    <select name="practicas" class="form-control">
                                        @foreach($practicas as $pra)
                                            <option value="">{{$pra->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--Fin LEYNER-->

                            <!--BAYAS-->
                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('Tipo de Beca') }}</label>

                                <div class="col-md-6">
                                    <select name="beca" class="form-control">
                                        @foreach($beca as $bec)
                                            <option value="">{{$bec->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('Primera razon de Beca') }}</label>

                                <div class="col-md-6">
                                    <select name="beca1" class="form-control">
                                        @foreach($beca1 as $bec1)
                                            <option value="">{{$bec1->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('segunda razon de Beca') }}</label>

                                <div class="col-md-6">
                                    <select name="beca2" class="form-control">
                                        @foreach($beca2 as $bec2)
                                            <option value="">{{$bec2->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('tercera razon de Beca') }}</label>

                                <div class="col-md-6">
                                    <select name="beca3" class="form-control">
                                        @foreach($beca3 as $bec3)
                                            <option value="">{{$bec3->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('cuarta razon de Beca') }}</label>

                                <div class="col-md-6">
                                    <select name="beca4" class="form-control">
                                        @foreach($beca4 as $bec4)
                                            <option value="">{{$bec4->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('quinta razon de Beca') }}</label>

                                <div class="col-md-6">
                                    <select name="beca5" class="form-control">
                                        @foreach($beca5 as $bec5)
                                            <option value="">{{$bec5->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('sexta razon de Beca') }}</label>

                                <div class="col-md-6">
                                    <select name="beca6" class="form-control">
                                        @foreach($beca6 as $bec6)
                                            <option value="">{{$bec6->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        <!--FIN BAYAS>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection