@section('external-css')
    <link href="{{ asset('assets/css/external/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/jquery-ui.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/jquery.bxslider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/wfmi-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/flexslider.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/removesidescroll.css') }}" rel="stylesheet">

@endsection
@extends('layouts.principal', ['schedule' => $schedule], ['schedule2' => $schedule2])
    @section('content')
    <!-- Header -->
    <header id="home-half">
        <div class="fullscreen-slider">
            <div class="tbl">
                <div class="tbl-cell">
                    <ul class="title-slider">
                        <li>
                            <h1>
                                <span class="color-text">FisioEstética</span> Ahora
                            </h1>
                        </li>
                        <li>
                            <h1>
                                <span class="color-text">No</span> Esperes más
                            </h1>
                        </li>
                        <li>
                            <h1>
                                Comienza <span class="color-text">Hoy mismo</span>
                            </h1>
                        </li>
                        <li>
                            <h1>
                                Date <span class="color-text">Un</span> Gusto
                            </h1>
                        </li>
                    </ul>
                    <p>La belleza es la expresión estética del amor.</p>   
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
   @include('mainpage-boxes')

    <!-- Dark Bg -->
    <div class="dark-bg  default-hovered animated-text">
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <br> <br> <br> <br>
                        <h2>Esperamos tu visita</h2>
                        <h2>Clínica FisioEstética Glow</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dark Bg -->
        <!--News-->
       <div id="newsSection">
            <div class="row">
                <div class="col-lg-12 text-center blog-intro-header">
                    <h1>Anuncios</h1>
                    <br>
                    <p class="color-text">
                        Mantente informado sobre nuestra clínica.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="flexslider simple-caption slide">
                        <ul class="slides">
                            @foreach($news as $new)
                            <li>
                                <img src="{{$new->imageUrl}}" />
                                <p class="flex-caption"><span>{{$new->title}}</span><br> {{$new->description}}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-offset-3 col-md-6">
     {!!link_to('news', $title='Ver más anuncios', $attributes = ['id'=>'btn-uptadeUser', 'class'=>'btn btn-normal btn-block text-uppercase'], $secure = null)!!}

                </div>
            </div>
        </div>
        <!--End-News-->
        <div class="vs-30"></div>
    <!--End Blog-->
    @endsection
    
    @section('external-js')
     <script src="{{ asset('assets/js/external/jquery.backstretch.min.js') }}"></script>
     <script src="{{ asset('assets/js/external/jquery.countTo.js') }}"></script>
     <script src="{{ asset('assets/js/external/jquery.easing.1.3.js') }}"></script>
     <script src="{{ asset('assets/js/external/jquery.bxslider.min.js') }}"></script>
     <script src="{{ asset('assets/js/external/slick.min.js') }}"></script>
     <script src="{{ asset('assets/js/external/jquery-ui.js') }}"></script>
     <script src="{{ asset('assets/js/external/lightbox-2.6.min.js') }}"></script>
     <script src="{{ asset('assets/js/external/jquery.flexslider-min.js') }}"></script>
    
     
    <script>
        $('.basic-carousel').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 210,
            itemMargin: 5
        });
    </script>
     
    @endsection
    

    
    @section('js')
        <script src="{{ asset('assets/js/project/script.js') }}"></script>
        <script src="{{ asset('assets/js/project/sliders.js') }}"></script>
    @endsection
