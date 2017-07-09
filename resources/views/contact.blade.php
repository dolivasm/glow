@extends('layouts.principal', ['schedule' => $schedule], ['schedule2' => $schedule2])
    @section('content')
  
    <!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center">Contacto</h1>
        </div>
    </section>
    <!-- End Section Title -->
    <!-- Contact -->
     <!-- Contact -->
    <section id="contact" class="bg-alternative">
        <div class="contact-wrapper">
            <!-- Seperator -->
            <section id="seperator1" class="seperator">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="font-icon">
                                <h1 class="text-center color-text"><i class="fa fa-map-o"></i> &nbsp; Localízanos con facilidad.</h1>
                            </div>
                            <div class="vs-25"></div>
                            <div class="seperator-text">
                                <p>Grecia. 25mts sur de la estación de bomberos. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Seperator -->
            <section id="contact-details">
                
                <div class="container pt-0">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="contact-map">

                                <div class="embed-responsive embed-responsive-16by9 ">
                                    <iframe src="https://www.google.com/maps/embed/v1/place?q=10.073688%2C%20-84.308694&key=AIzaSyD2aPh8z-F27MB3d3bzoHnWc7biFA5-Jdw" width="800" height="445" style="border:0; " allowfullscreen class="embed-responsive-item "></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-details-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                                <div class="contact-form">
                                    <h3 class="color-text">Déjanos tus consultas</h3>
                                    <p>Cuidado profesional de su salud y belleza corporal.</p>
                                    <!-- Contact Form -->
                                    {!!Form::open(['id'=>'contact-form'])!!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            @if (Auth::user())
                                                                <?php
                                                                    $name = Auth::user()->name.' '.Auth::user()->firstName.' '.Auth::user()->lastName;
                                                                ?>
                                                                {!!Form::text('contactName',$name,['id'=>'contactName','class'=>'form-control','required','placeholder'=>'Nombre'])!!}
                                                            @else
                                                                {!!Form::text('contactName',null,['id'=>'contactName','class'=>'form-control','required','placeholder'=>'Nombre'])!!}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            @if (Auth::user())
                                                                {!!Form::email('contactEmail', Auth::user()->email,['id'=>'contactEmail','class'=>'form-control','required','placeholder'=>'Correo'])!!}
                                                            @else
                                                                {!!Form::email('contactEmail',null,['id'=>'contactEmail','class'=>'form-control','required','placeholder'=>'Correo'])!!}
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            {!!Form::text('contactSubject',null,['id'=>'contactSubject','class'=>'form-control','required','placeholder'=>'Asunto'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            {!!Form::textarea('contactMessage',null,['id'=>'contactMessage','class'=>'form-control','required','placeholder'=>'Mensaje'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            {{Form::button('<i class="fa fa-envelope-o fa-2x"></i>', array('id'=>'button','type' => 'submit', 'class' => 'btn btn-normal btn-block'))}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    {{ Form::close() }}
                                    <!-- End Contact Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
       
    </section>
    <!-- End Contact -->
   @endsection
   @section('js')
     <script src="{{ asset('assets/js/external/jquery.easing.1.3.js') }}"></script>
     <script src="{{ asset('js/external/jquery.validate.min.js') }}"></script>
     <script src="{{ asset('js/admin/validate-error-message.js') }}"></script>
     {!!Html::script('js/admin/contact.js')!!}
    @endsection