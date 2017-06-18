
@extends('layouts.principal')

@section('content')

<div id="exTab2" class="container login-section">
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#1" data-toggle="tab"><i class="fa fa-lock"></i> Iniciar Sesión</a>
    </li>
  </ul>

  <div class="tab-content ">
    <div class="tab-pane active" id="1">
 <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12">
        <div class="contact-form login-form">
        
          <!-- Login Form -->
               <form id="login-form"  role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
            <fieldset>
              <div class="row">
                <div class="col-md-12">
                  <div class="control-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <div class="controls">
                      <input id="username" name="username" class="form-control" value="{{ old('username') }}" required="" placeholder="Usuario" type="text">
                   @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="control-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="controls">
                      <input id="password" name="password" class="form-control" required="" placeholder="Contraseña" type="password">
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="control-group {{ $errors->has('remember') ? ' has-error' : '' }}">
                    <div class="controls">
                        <div class="checkbox">
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                      </div>
                    </div>
                  </div>
                </div>
            </div>
           
              <div class="row">
                <div class="col-md-12">
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn btn-normal btn-block text-uppercase" id="login-send"><i class="fa fa-sign-in fa-2x"> Ingresar</i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="control-group">
                    <div class="controls text-center">
                      <a class="btn btn-link " href="{{ route('password.request') }}">
                                    ¿Olvido su contraseña?
                                </a>
                    </div>
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="control-group">
                    <div class="controls text-center">
                      <a class="btn btn-link " href="{{ route('register') }}">
                                    ¿No tienes cuenta aún?
                                </a>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
          <!-- End Contact Form -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
