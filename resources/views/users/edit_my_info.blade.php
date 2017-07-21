@extends('layouts.principal', ['schedule' => $schedule], ['schedule2' => $schedule2])

@section('external-css')
    {!!Html::style('assets/css/external/daterangepicker.css')!!}
    
@endsection

@section('content')
    <!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center sombraLetrasEncabezado">Actualizar mi Información</h1>
        </div>
    </section>
    <!-- End Section Title -->
    
    <div id="exTab2" class="container login-section">
      <div class="tab-content ">
        <div class="tab-pane active" id="1">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4>Si desea cambiar su nombre o fecha de nacimiento por favor contáctenos y con mucho gusto le ayudaremos.</h4>
                <div class="container pb-0"></div>
                <!--<form id="register-form" class="default-form" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }} -->
            {!!Form::model($user,['id'=>'formUpdateUser', 'method'=>'post','url' => 'updateMyInfo'])!!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
              <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  {!!Form::text('phone', null, ['id'=>'phone','size'=>'30x4', 'class' => 'form-control', 'maxlength'=>'20', 'placeholder'=>'Télefono'])!!}
                 @if ($errors->has('phone'))
                     <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                     </span>
                 @endif
              </div>
              <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  {!!Form::email('email', null, ['id'=>'email','size'=>'30x4', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'placeholder'=>'Correo'])!!}
                  @if ($errors->has('email'))
                     <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                     </span>
                 @endif
              </div>
               <div class="form-group col-md-4 col-sm-12 col-xs-12">
                   {!!Form::text('username', null, ['id'=>'username','size'=>'30x4', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'placeholder'=>'Nombre de Usuario'])!!} <br>
                  @if ($errors->has('username'))
                     <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                     </span>
                 @endif
              </div>
              <div class="form-group col-md-offset-3 col-md-3 col-sm-12 col-xs-12">
                {!!  Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar',['class' => 'btn btn-normal btn-block text-uppercase','id' => 'addSubmitInfo', 'type'=>'submit'])!!}

              </div>
              <div class="form-group col-md-3 col-sm-12 col-xs-12">
                <a onClick="getPassword();" class="btn btn-normal btn-block text-uppercase"><i class="fa fa-key" aria-hidden="true"></i>Cambiar Contraseña</a>
            </div>
            </div>
          <!-- </form> -->
          {!!Form::close()!!}
         </div>
        </div>
      </div>
    </div>
    
    <!--Modals Section-->
     <div id="div-modals">
        @include('users.change_password_modal');
    </div>
     <!--End Modals Section-->
@endsection

@section('external-js')
    <script src="{{ asset('js/external/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/validate-error-message.js') }}"></script>
@endsection

@section('js')
    {!!Html::script('js/edit-my-info.js')!!}
@endsection