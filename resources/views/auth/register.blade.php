@section('external-css')
    {!!Html::style('assets/css/external/daterangepicker.css')!!}
@endsection
@extends('layouts.principal')


@section('content')
<div id="exTab2" class="container login-section">
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#1" data-toggle="tab"><i class="fa fa-address-card"></i> Registrarse</a>
    </li>

  </ul>

  <div class="tab-content ">
    <div class="tab-pane active" id="1">
        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
           <form id="register-form" class="default-form" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
        <div class="row clearfix">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-4 col-sm-12 col-xs-12">
            <input id="name" type="text" maxlength="255" name="name" value="{{ old('name') }}" placeholder="Nombre" required="">
             @if ($errors->has('name'))
                 <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                 </span>
             @endif
          </div>
          
           <div class="form-group col-md-4 col-sm-12 col-xs-12">
            <input id="firstName" type="text" maxlength="255" name="firstName" value="{{ old('firstName') }}" placeholder="Primer Apellido" required="">
            @if ($errors->has('firstName'))
                 <span class="help-block">
                    <strong>{{ $errors->first('firstName') }}</strong>
                 </span>
             @endif
          </div>
          <div class="form-group col-md-4 col-sm-12 col-xs-12">
             <input id="lastName" type="text" maxlength="255" name="lastName" value="{{ old('lastName') }}" placeholder="Segundo Apellido" required="">
              @if ($errors->has('lastName'))
                 <span class="help-block">
                    <strong>{{ $errors->first('lastName') }}</strong>
                 </span>
             @endif
          </div>
          
        <div class="form-group col-md-4 col-sm-12 col-xs-12">
             <input id="birthday" type="text" name="birthday" value="{{ old('birthday') }}" required placeholder="Fecha Nacimiento"readonly>
            @if ($errors->has('birthday'))
                 <span class="help-block">
                    <strong>{{ $errors->first('birthday') }}</strong>
                 </span>
             @endif
          </div>
          
          <div class="form-group col-md-4 col-sm-12 col-xs-12">
             <input id="phone" type="text" maxlength="8" name="phone" value="{{ old('phone') }}" placeholder="Télefono">
             @if ($errors->has('phone'))
                 <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                 </span>
             @endif
          </div>
          <div class="form-group col-md-4 col-sm-12 col-xs-12">
             <input id="email" type="email" maxlength="255" name="email" value="" placeholder="Correo" required="">
              @if ($errors->has('email'))
                 <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                 </span>
             @endif
          </div>
           <div class="form-group col-md-6 col-sm-12 col-xs-12">
             <input id="username" type="text" maxlength="255" name="username" value="" placeholder="Usuario" required="">
              @if ($errors->has('username'))
                 <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                 </span>
             @endif
          </div>
          <div class="form-group col-md-6 col-sm-12 col-xs-12">
             <input id="password" type="password" maxlength="255" name="password" value="" placeholder="Contraseña" required="">
               @if ($errors->has('password'))
                     <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                   </span>
                     @endif
          </div>
           <div class="form-group col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
              <input id="password-confirm" type="password" maxlength="255" name="password_confirmation" required="" placeholder="Confirme su contraseña">
             </div>
     
          
          <div class="form-group col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-normal btn-block text-uppercase"><i class="fa fa-floppy-o" aria-hidden="true"></i>
 Registrarme</button>
          </div>
        </div>
      </form>
     </div>
    </div>
  </div>
</div>




@endsection

@section('external-js')

{!!Html::script('assets/js/external/moment.min.js')!!}

<!-- Incluye el Date Range Picker -->
{!!Html::script('assets/js/external/daterangepicker.js')!!}
{!!Html::script('js/mydatapicker.js')!!}

@endsection