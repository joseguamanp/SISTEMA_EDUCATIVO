@extends('layouts.header_inicio')

@section('content')
  <!-- Page content -->
<div>
  <div class="pb-5 pt-5" id="login-header">
    <div class="container">
      <div class="header-body text-center">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6">
            <h3 class="">Bienvenido!</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small>Ingresa tus credenciales</small>
            </div>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
              @csrf
              <div class="form-group has-feedback mb-3" id="gruop-input-login">
                <i class="fas fa-user form-control-feedback"></i>
                <input type="number" class="form-control {{ $errors->has('cedula') ? 'is-invalid' : '' }}" name="cedula" id="cedula" value="{{ old('cedula') }}" placeholder="Cédula" min="0" required autofocus>
                @if ($errors->has('cedula'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cedula') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group has-feedback" id="grup-input-login">
                <i class="fas fa-lock form-control-feedback"></i>
                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Contraseña" required>
                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                <label class="custom-control-label" for=" customCheckLogin">
                  <span class="text-muted">{{ __('Recuérdame') }}</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">{{ __('Iniciar sesión') }}</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col text-right">
            <a href="#" class=""><small>¿Olvidaste tu contraseña?</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection

@section('script')
  <script type="text/javascript">
    themeLogin();
  </script>
@endsection
