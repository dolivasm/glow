@section('external-css')
    <link href="{{ asset('css/external/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/external/fullcalendar.print.min.css') }}" rel="stylesheet" media='print'>
    <link href="{{ asset('css/external/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/external/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/external/bootstrap-clockpicker.min.css') }}" rel="stylesheet">

@endsection
    
@extends('layouts.principal', ['schedule' => $schedule])

      @section('content')
      
        <section id="section-title" class="bg-alternative">
            <div id="top-img-bg">
                <h1 class="text-center">Citas</h1>
            </div>
        </section>
      
        <div class="container">
            @if (!Auth::guest())
                 @if((Auth::user()->role_id)==1)
                     <div class="row">
                        <div class="col-md-offset-3 col-md-6 text-center">
                            <a class="btn btn-normal-add btn-lg" OnClick="updateSchedule('schedule/create');" style="padding-bottom=10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                             Modificar Horario</a>
                        </div>
                    </div>
                    @endif
            @endif
            <br>
            <a OnClick="showHowToModal();" class="btn btn-normal btn-block text-uppercase">¿Cómo reservar una cita?</a>
            <br>
            <div class="row">
                <div class="col-md-offset-2 col-md-3 text-center">
                    <h4 id="myAppointments">
                        Mis reservaciones
                    </h4>
                </div>
                <div class="col-md-3 text-center">
                    <h4 id="AppointmentsReserved">
                        Espacios reservados
                    </h4>
                    
                </div>
                <div class="col-md-3 text-center">
                    <h4 id="specialEvent">
                        Eventos Especiales
                    </h4>
                    
                </div>
            </div>
           
            <!-- Calendar is rendered on this section-->
             <div class="row">
                 <div id='calendar'></div>
             </div>
            

        </div>
       @include('appointment.howto-modal')
        @if (!Auth::guest())
        @include('appointment.add-modal')
        @include('appointment.edit-modal')
        @include('appointment.delete-modal')
        @include('appointment.change-time')
            @if((Auth::user()->role_id)==1)
                @include('schedule.update-modal')
                @include('appointment.admin-options')
                @include('appointment.block-hours-modal')
                @include('appointment.edit-block-hours-modal')
                @include('appointment.delete-block-modal')
            @endif
            @include('appointment.edit-block-hours-modal')
        @endif
    @endsection
     @section('external-js')
    <script src="{{ asset('assets/js/external/moment.min.js') }}"></script>
      <script src="{{ asset('js/external/fullcalendar.min.js') }}"></script>
      <script src="{{ asset('js/external/bootstrap-material-datetimepicker.js') }}"></script>
      <script src="{{ asset('js/external/bootstrap-select.js') }}"></script>
      <script src="{{ asset('js/external/locale-all.js') }}"></script>
      <script src="{{ asset('js/external/bootstrap-clockpicker.min.js') }}"></script>
    @endsection
   
@section('js')
    <script src="{{ asset('js/admin/admin-appointment.js') }}"></script>
     <script src="{{ asset('js/external/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/validate-error-message.js') }}"></script>
@endsection