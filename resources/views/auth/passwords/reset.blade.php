
@extends('layouts.principal')

@section('content')
<!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center">Restablecer Contraseña</h1>
        </div>
    </section>
    <!-- End Section Title -->

<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12">
             @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="contact-form">
        
          <!-- Login Form -->
           <form id="login-form" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
             
            <fieldset>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row">
                <div class="col-md-12">
                  <div class="control-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="controls">
                      <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required placeholder="Correo">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                      <input id="password" name="password" class="form-control" required="" placeholder="Nueva contraseña" type="password">
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="control-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="controls">
                        
                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar contraseña">
                     @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                </div>
              </div>
    
           
              <div class="row">
                <div class="col-md-12">
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn btn-normal btn-block" id="login-send"> Cambiar Contraseña </button>
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
@endsection

