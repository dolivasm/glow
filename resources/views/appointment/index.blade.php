@section('external-css')
    <link href="{{ asset('css/external/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/external/fullcalendar.print.min.css') }}" rel="stylesheet" media='print'>
    <link href="{{ asset('css/external/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/external/bootstrap-colorpicker.min.css') }}" rel="stylesheet">

@endsection
    
@extends('layouts.principal')

      @section('content')
      
        <section id="section-title" class="bg-alternative">
            <div id="top-img-bg">
                <h1 class="text-center">Citas</h1>
            </div>
        </section>
      
        <div class="container">
            
            <div id='calendar'></div>

            <div id="modal-event" class="modal fade" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>DETALLES DE EVENTO</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <div class="form-group">
                                {{ Form::label('_title', 'TITULO DE EVENTO') }}
                                {{ Form::text('_title', old('_title'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_date_start', 'FECHA INICIO') }}
                                {{ Form::text('_date_start', old('_date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_time_start', 'HORA INICIO') }}
                                {{ Form::text('_time_start', old('_time_start'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_date_end', 'FECHA HORA FIN') }}
                                {{ Form::text('_date_end', old('_date_end'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_color', 'COLOR') }}
                                <div class="input-group colorpicker">
                                    {{ Form::text('_color', old('_color'), ['class' => 'form-control']) }}
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a id="delete" data-href="{{ url('appointment') }}" data-id="" class="btn btn-danger">ELIMINAR</a>
                            <button type="button" class="btn btn-dafault" data-dismiss="modal">CANCELAR</button>
                            {!! Form::submit('ACTUALIZAR', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('appointment.add-modal')
    @endsection
     @section('external-js')
        <script src="{{ asset('assets/js/external/moment.min.js') }}"></script>
      <script src="{{ asset('js/external/fullcalendar.min.js') }}"></script>
      <script src="{{ asset('js/external/bootstrap-material-datetimepicker.js') }}"></script>
      <script src="{{ asset('js/external/bootstrap-colorpicker.min.js') }}"></script>
      <script src="{{ asset('js/external/locale-all.js') }}"></script>
    @endsection
   
@section('js')
    <script src="{{ asset('js/admin/admin-appointment.js') }}"></script>
     <script src="{{ asset('js/external/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/validate-error-message.js') }}"></script>
@endsection