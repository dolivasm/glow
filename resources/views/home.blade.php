@section('external-css')
    <link href="{{ asset('assets/css/external/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/jquery-ui.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/ytplayer.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/jquery.bxslider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/yamm.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/wfmi-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/flexslider.css') }}" rel="stylesheet">

@endsection
@extends('layouts.principal')
    @section('content')
    <!-- Header -->
    <header id="home-half">
        <div class="fullscreen-slider">
            <div class="tbl">
                <div class="tbl-cell">
                    <ul class="title-slider">
                        <li>
                            <h1>
                                <span class="color-text">
                                    Fisioestetica
                                </span> Ahora
                            </h1>
                        </li>
                        <li>
                            <h1>
                                <span class="color-text">
                                    No
                                </span> Esperes más
                            </h1>
                        </li>
                        <li>
                            <h1>
                                Comienza	
                                <span class="color-text">
                                    Hoy mismo
                                </span>
                            </h1>
                        </li>
                        <li>
                            <h1>
                                Hay
                                <span class="color-text">
                                    Una
                                </span> Solución
                            </h1>
                        </li>
                    </ul>
                    
                                 <p>La belleza es la expresión estética del amor. </p>   
                    

                </div>
            </div>

        </div>
    </header>
    <!-- End Header -->
   @include('services.index')
   
    <div class="section-title text-center about-PhysiotherapyPro-top">
            <div class="parallax-section-divider">
                <div class="container pt-0">
                    <p>
                         ¿Necesitas una<span class="color-text"> Cita</span>?
                    </p>
                    <a class="btn btn-normal-2 btn-large" href="appointment"><i class="icon-i-registration"></i> Reservar</a>
                </div>
            </div>
        </div>
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

                <div class="col-md-offset-2 col-md-8">
                    <div class="flexslider simple-caption">
                        <ul class="slides">
                            @foreach($news as $new)
                            <li>
                                <img  src="{{$new->imageUrl}}" />
                                <p class="flex-caption"><span>{{$new->title}}</span><br> {{$new->description}}</p>
                            </li>
                            @endforeach
                       
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-offset-2 col-md-8">
     {!!link_to('news', $title='Ver todos', $attributes = ['id'=>'btn-uptadeUser', 'class'=>'btn btn-normal btn-block text-uppercase'], $secure = null)!!}

                </div>
            </div>
            </div>
        </div>
        <!--End-News-->
 
    <!-- Appointment -->
    <section id="appointment">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Make An Appointment</h1>
                    <div class="vs-15">
                    </div>
                    <p class="text-center">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh.</p>
                </div>
            </div>
            <div class="vs-35">   </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <img class="img-responsive" src="assets/img/blog/3.jpg" alt="blog3" />
                </div>
                <div class="col-xs-12 col-sm-6">

                    <form method="post" action="index.html" class="default-form">
                        <div class="row clearfix">
                            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <input type="text" name="name" value="" placeholder="Your Name" required="">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <input type="email" name="email" value="" placeholder="Your Email" required="">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <select name="subject">
                                    <option>-Subject to Discuss-</option>
                                    <option>Personal Problems</option>
                                    <option>Child Problems</option>
                                    <option>Relationship Problems</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="phone" value="" placeholder="Your Phone Number" required="">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="datepicker" id="datepicker" value="" placeholder="Available Date" required="">
                            </div>
                            <div class="form-group padd-top-10 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-normal pull-right">Send Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Appointment -->
    <!-- Dark Bg -->
    <div class="dark-bg  default-hovered animated-text">
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2>Physiotherapy Pro HTML Template</h2>
                        <h2>Buy Now !</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dark Bg -->
    <!-- Photo Gallery -->
    <section id="photo-gallery-1" class="bg-alternative">
        <div class="photo-gallery-wrapper">
            <div class="container">
                <h1 class="text-center color-text">Photo Gallery Full Width</h1>
                <br>
                <p class="text-center heading-intro-p">Sed porttitor, justo in feugiat mollis, nunc velit luctus purus, in commodo nisi maga ut san. </p>
                <div class="vs-30"></div>
                <!-- Photo Gallery Full Width  -->
                <div id="photo-gallery-fw">
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/1.jpg" data-lightbox="pic" title="@if (!Auth::guest()) {{ Auth::user()->name }} @endif"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/1.jpg" class="img-responsive" alt='blog1' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/2.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/2.jpg" class="img-responsive" alt='' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="assets/img/blog/1.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/1.jpg" class="img-responsive" alt='blog2' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/3.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/3.jpg" class="img-responsive" alt='blog3' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/2.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/2.jpg" class="img-responsive" alt='blog4' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/1.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/1.jpg" class="img-responsive" alt='blog5' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/3.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/3.jpg" class="img-responsive" alt='blog6' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/2.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/2.jpg" class="img-responsive" alt='blog7' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/1.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/1.jpg" class="img-responsive" alt='blog8' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/3.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/3.jpg" class="img-responsive" alt='blog9' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/2.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/2.jpg" class="img-responsive" alt='blog10' />
                            </div>
                        </figure>
                    </div>
                    <div class="photo-gallery-item">
                        <figure class="image-overlay">
                            <div class="hover-image-wrapper">
                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="assets/img/blog/1.jpg" data-lightbox="pic" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit quia"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                                <img src="assets/img/blog/1.jpg" class="img-responsive" alt='blog11' />
                            </div>
                        </figure>
                    </div>
                </div>
                <!-- End Photo Gallery Full Width  -->
            </div>
        </div>
    </section>
    <!-- End Photo Gallery -->
    <!-- Testimonials -->
    <section id="testimonials">
        <div class="testimonals-bg">
            <div class="container">
                <div class='row'>
                    <div class="col-lg-12">

                        <div class="section-title-alternative text-center">
                            <h2>Testimonials</h2>
                        </div>
                        <div class="vs-60 hidden-xs"></div>
                        <div class="testimonals-slider">
                            <div>
                                <p class="testimonals-text">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                                <div class="vs-10"></div>
                                <p class="testimonals-person"> Albert Einstein, <span>Big Brain Inc</span></p>
                                <div class="vs-20"></div>
                            </div>
                            <div>
                                <p class="testimonals-text">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <div class="vs-10"></div>
                                <p class="testimonals-person"> Nicola Tesla, <span>AC Inc</span></p>
                                <div class="vs-20"></div>
                            </div>
                            <div>
                                <p class="testimonals-text">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <div class="vs-10"></div>
                                <p class="testimonals-person"> Jane Doe, <span>Beautiful Designer</span></p>
                                <div class="vs-20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="vs-60"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonials -->
    <!--Blog-->
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center blog-intro-header">
                    <h1>BLOG</h1>
                    <br>
                    <p>
                        Sed porttitor, justo in feugiat mollis, nunc velit luctus purus, in commodo nisi magna ut sa.
                    </p>
                </div>
            </div>
            <div class="vs-30"></div>
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12 home-blog-item">
                    <div class="blog-post-main-img">
                        <img src="assets/img/blog/1.jpg" class="img-responsive" alt="blog1">
                    </div>

                    <h1 class="blog-post-title pt-35">
                        <a href="blog-post-html">Vision gives you a limitless freedom!</a>
                    </h1>
                    <div class="blog-post-title-details">
                        <i class="fa fa-calendar-o"></i> March 5, 2016 &nbsp;&nbsp;&nbsp; Posted by Admin &nbsp;&nbsp;&nbsp;   <i class="fa fa-comments-o"></i> 12
                    </div>
                    <div class="vs-30"></div>
                    <div class="blog-post-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elementum arcu at risus faucibus pretium. Vestibulum egestas nulla lacus, a faucibus justo vulputate et.
                        </p>
                        <div class="vs-20"></div>
                        <p><a href="blog-post.html" class="btn btn-normal-alternative-blog ">Read More...</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 home-blog-item">
                    <div class="blog-post-main-img">
                        <img src="assets/img/blog/2.jpg" class="img-responsive" alt="blog2">
                    </div>

                    <h1 class="blog-post-title pt-35">
                        <a href="blog-post-html">Vision gives you a limitless freedom!</a>
                    </h1>
                    <div class="blog-post-title-details">
                        <i class="fa fa-calendar-o"></i> March 5, 2016 &nbsp;&nbsp;&nbsp; Posted by Admin &nbsp;&nbsp;&nbsp;   <i class="fa fa-comments-o"></i> 12
                    </div>
                    <div class="vs-30"></div>
                    <div class="blog-post-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elementum arcu at risus faucibus pretium. Vestibulum egestas nulla lacus, a faucibus justo vulputate et.
                        </p>
                        <div class="vs-20"></div>
                        <p><a href="blog-post.html" class="btn btn-normal-alternative-blog ">Read More...</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 home-blog-item">
                    <div class="blog-post-main-img">
                        <img src="assets/img/blog/3.jpg" class="img-responsive" alt="blog3">
                    </div>

                    <h1 class="blog-post-title pt-35">
                        <a href="blog-post-html">Vision gives you a limitless freedom!</a>
                    </h1>
                    <div class="blog-post-title-details">
                        <i class="fa fa-calendar-o"></i> March 5, 2016 &nbsp;&nbsp;&nbsp; Posted by Admin &nbsp;&nbsp;&nbsp;   <i class="fa fa-comments-o"></i> 12
                    </div>
                    <div class="vs-30"></div>
                    <div class="blog-post-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elementum arcu at risus faucibus pretium. Vestibulum egestas nulla lacus, a faucibus justo vulputate et.
                        </p>
                        <div class="vs-20"></div>
                        <p><a href="blog-post.html" class="btn btn-normal-alternative-blog ">Read More...</a><a href="blog-post.html" class="btn btn-normal-alternative-blog ">Read More...</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Blog-->
    @endsection
    
    @section('external-js')
     <script src="{{ asset('assets/js/external/jquery.backstretch.min.js') }}"></script>
     <script src="{{ asset('assets/js/external/jquery.countTo.js') }}"></script>
     <script src="{{ asset('assets/js/external/jquery.easing.1.3.js') }}"></script>
     <script src="{{ asset('assets/js/external/jquery.mb.YTPlayer.js') }}"></script>
     <script src="{{ asset('assets/js/external/waypoints.min.js') }}"></script>
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
