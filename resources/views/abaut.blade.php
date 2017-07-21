@extends('layouts.principal', ['schedule' => $schedule], ['schedule2' => $schedule2])
@section('external-css')
    <link href="{{ asset('assets/css/external/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/jasny-bootstrap.css') }}" rel="stylesheet">
     <link href="{{ asset('css/external/toastr.css') }}" rel="stylesheet">
@endsection
    @section('content')
    <!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center sombraLetrasEncabezado">Nosotros</h1>
        </div>
    </section>
    <!-- End Section Title -->
    <!-- About Us -->
    <section id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h1>Bienvenido(a) a <span class="color-text">Clínica FisioEstética Glow</span> </h1>
                    <p><strong>Hace ya 10 años que trabajo en el área de la estética y hace unos 7 años como fisioterapeuta,
                    definitivamente es algo que me apasiona.</strong></p>
                    <p>Que mis clientes se sientan seguros y confiados con el trabajo que realizo es una de mis mayores satisfacciones.
                    En este recorrido he tenido la oportunidad de enseñar mis conocimientos en escuelas de estética y también de aprender y perfeccionar mi trabajo llevando cursos y seminarios dentro y fuera del país. 
                    Desde hace 6 años nació GLOW y ha ido creciendo conmigo y con todas las personas que han confiado en mis servicios.
                    Buscar la excelencia, mejorar mis destrezas y habilidades para siempre dar un trabajo profesional y de calidad es mi meta.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <img src="img/logo.jpg" class="img-responsive" style="border:5px solid #d9d7d9" />
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->
   
    <!-- Team Members -->
    <div class="team-members">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center color-text">Profesional</h1>
                    <div class="vs-35"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-4">
                    <div class="team-member-wrap">
                        <div class="team-member-img">
                            <figure class="image-overlay">
                                <div class="hover-image-wrapper">
                                    <a href="img/foto_amanda.jpeg" data-lightbox="webdesign">
                                <span class="hover-image-wrap"><span class="hover-image"><i class="fa fa-search"></i></span></span>
                                <img src="img/foto_amanda.jpeg" class="img-responsive" alt="Amanda Barrantes">
                                    </a>
                                </div>
                            </figure>

                        </div>
                        <div class="team-member-details bg-blue text-center">
                            <h4>Amanda Barrantes</h4>
                            <h5>Fisioterapeuta y Esteticista</h5>
                            <p>Graduada de CEM Escuelas Europeas de Estética.</p>
                            <p>Licenciada en Terapia Física/Universidad Americana.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Members -->
  @endsection
    @section('js')
@endsection

@section('external-js')
        <script src="{{ asset('assets/js/external/lightbox-2.6.min.js') }}"></script>
    @endsection