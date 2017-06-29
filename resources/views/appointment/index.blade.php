@section('external-css')
    <link href="{{ asset('css/external/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/external/fullcalendar.print.min.css') }}" rel="stylesheet" media='print'>
    <link href="{{ asset('css/external/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/external/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/external/bootstrap-clockpicker.css') }}" rel="stylesheet">

@endsection
    
@extends('layouts.principal')

      @section('content')
      
        <section id="section-title" class="bg-alternative">
            <div id="top-img-bg">
                <h1 class="text-center">Citas</h1>
            </div>
        </section>
      
        <div class="container">
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
        @include('appointment.add-modal')
        @include('appointment.edit-modal')
        @include('appointment.delete-modal')
         @include('appointment.change-time')
    @endsection
     @section('external-js')
    <script src="{{ asset('assets/js/external/moment.min.js') }}"></script>
      <script src="{{ asset('js/external/fullcalendar.min.js') }}"></script>
      <script src="{{ asset('js/external/bootstrap-material-datetimepicker.js') }}"></script>
      <script src="{{ asset('js/external/bootstrap-select.js') }}"></script>
      <script src="{{ asset('js/external/locale-all.js') }}"></script>
      <script src="{{ asset('js/external/bootstrap-clockpicker.js') }}"></script>
    @endsection
   
@section('js')
    <script src="{{ asset('js/admin/admin-appointment.js') }}"></script>
     <script src="{{ asset('js/external/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/validate-error-message.js') }}"></script>
@endsection