@section('external-css')
    <link href="{{ asset('assets/css/external/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/external/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('css/external/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
@endsection

@extends('layouts.principal', ['schedule' => $schedule])
    @section('content')
    
     <!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center">Servicios</h1>
        </div>
    </section>
    <!-- End Section Title -->
    
         <!--Blog-->
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center blog-intro-header">
                    <br>
                    <h3 class="color-text">
                        Vive nuestros servicios
                    </h3>
                </div>
            </div>

            <div class="row"> 
                
                
                <div class="col-md-8">
                    {!! Form::open(['url' => '#','id'=>'searchServicesForm']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    
                    <div class="form-group">
    	                {!!Form::text('txt_search',null,['id'=>'txt_search','name'=>'Ingrese el valor que desea buscar','class'=>'form-control','placeholder'=>'Ejemplo: Depilación'])!!}
    	            </div>
    	          
    	       </div>
    	       <div class="col-md-2">
    	           {!!  Form::submit('Buscar',['class' => 'btn btn-normal btn-block text-uppercase','id' => 'addSubmit'])!!}
    	             {!! Form::close() !!}
                </div>
                 <div class="col-md-2">
    	             <button  class='btn btn-normal btn-block text-uppercase'  OnClick="seeAllServices();"><i class="ion-thumbsup"> </i>Ver todos</button>
                </div>
                
                
                
            </div>


           
            <div class="vs-20"></div>
            <div id="div-services">

            </div>
            
               
            
        </div>
        
       
        
    </section>
     <!--Modals Section-->
     <div id="div-modals">
         <!--Modals Add Section-->
        @include('services.add-services-modal');
        <!--Modals Edit Section-->
        @include('services.edit-services-modal');
        <!--Modals Delete Section-->
        @include('services.delete-services-modal');
    </div>
     <!--End Modals Section-->
     
    <!--End Blog-->
    @endsection
    
    @section('external-js')
        <script src="{{ asset('assets/js/external/lightbox-2.6.min.js') }}"></script>
        <script src="{{ asset('js/external/bootstrap-clockpicker.min.js') }}"></script>
    @endsection
    
    @section("js")
    <script src="{{ asset('js/admin/services.js') }}"></script>
    <script src="{{ asset('js/external/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/validate-error-message.js') }}"></script>

        @if(!Auth::guest())
            @if((Auth::user()->role_id)==1)
              <script src="{{ asset('js/admin/admin-services.js') }}"></script>
              <script src="{{ asset('assets/js/external/jasny-bootstrap.js') }}"></script>
              
              
             
            @endif
        @endif
    @endsection