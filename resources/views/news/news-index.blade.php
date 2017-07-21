@section('external-css')
    <link href="{{ asset('assets/css/external/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/jasny-bootstrap.css') }}" rel="stylesheet">
     <link href="{{ asset('css/external/toastr.css') }}" rel="stylesheet">
@endsection

@extends('layouts.principal', ['schedule' => $schedule], ['schedule2' => $schedule2])
    @section('content')
    
     <!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center sombraLetrasEncabezado">Anuncios</h1>
        </div>
    </section>
    <!-- End Section Title -->
    
         <!--Blog-->
    <section id="blog">
        <div class="container news-container">
            <div class="row">
                <div class="col-lg-12 text-center blog-intro-header">
                    <br>
                    <h3 class="color-text">
                        Mantente informado sobre nuestra clínica.
                    </h3>
                </div>
            </div>
            <div class="row"> 
                
                
                <div class="col-md-8">
                    {!! Form::open(['url' => '#','id'=>'searchNewsForm']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    
                    <div class="form-group">
    	                {!!Form::text('txt_search',null,['id'=>'txt_search','title'=>'Ingrese el valor que desea buscar','class'=>'form-control','placeholder'=>'Eje: Día de la mujer'])!!}
    	            </div>
    	          
    	       </div>
    	       <div class="col-md-2">
    	           {!!  Form::submit('Buscar',['class' => 'btn btn-normal btn-block text-uppercase','id' => 'addSubmit'])!!}
    	             {!! Form::close() !!}
                </div>
                 <div class="col-md-2">
    	             <button  class='btn btn-normal btn-block text-uppercase'  OnClick="seeAllNews();"><i class="ion-thumbsup"> </i>Ver todos</button>
                </div>
                
                
                
            </div>
           
            <div class="vs-20"></div>
            <div id="div-news">
               
            </div>
            
               
            
        </div>
        
       
        
    </section>
     <!--Modals Section-->
     <div id="div-modals">
         <!--Modals Add Section-->
        @include('news.add-news-modal')
        <!--Modals Edit Section-->
        @include('news.edit-news-modal')
        <!--Modals Delete Section-->
        @include('news.delete-news-modal')
    </div>
     <!--End Modals Section-->
     
    <!--End Blog-->
    @endsection
    
    @section('external-js')
        <script src="{{ asset('assets/js/external/lightbox-2.6.min.js') }}"></script>
    @endsection
    
    @section("js")
    <script src="{{ asset('js/admin/news.js') }}"></script>
    <script src="{{ asset('js/external/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/validate-error-message.js') }}"></script>

        @if(!Auth::guest())
        @if((Auth::user()->role_id)==1)
              <script src="{{ asset('js/admin/admin-news.js') }}"></script>
              <script src="{{ asset('assets/js/external/jasny-bootstrap.js') }}"></script>
            @endif
        @endif
    @endsection
    