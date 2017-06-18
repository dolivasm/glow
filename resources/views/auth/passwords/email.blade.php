
@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12">
             @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="contact-form login-form">
        
          <!-- Login Form -->
          <form  id="login-form"  role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
            <fieldset>
              <div class="row">
                <div class="col-md-12">
                  <div class="control-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="controls">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Ingrese su correo">
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
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn btn-normal btn-block " id="login-send">Obtener link</button>
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
