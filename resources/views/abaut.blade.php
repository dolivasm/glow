@extends('layouts.principal', ['schedule' => $schedule], ['schedule2' => $schedule2])
    @section('content')
    <!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center">Nosotros</h1>
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
                                    <div class="hover-content">
                                        <ul>
                                            <li>
                                                <a href="person-details.html" class="btn-social-media"><i class="fa fa-search"></i></a>
                                            </li>

                                        </ul>
                                    </div>
                                    <img src="assets/img/people/smile-1.jpg" class="img-responsive" alt='' />
                                </div>
                            </figure>

                        </div>
                        <div class="team-member-details bg-blue text-center">
                            <h4>Amanda Barrantes</h4>
                            <h5>Fisioterapeuta</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

                        </div>
                        <!-- <div class="team-member-links text-center bg-blue-dark">
                            <div class="vs-10"></div>
                            <div>
                                <a href="#" class="btn-social-media"><i class="fa fa-facebook"></i></a><a href="#" class="btn-social-media"><i class="fa fa-twitter"></i></a><a href="#" class="btn-social-media"><i class="fa fa-google-plus"></i></a><a href="#" class="btn-social-media"><i class="fa fa-pinterest"></i></a>
                            </div>
                            <div class="vs-10"></div>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="team-member-wrap">
                        <div class="team-member-img">
                            <figure class="image-overlay">
                                <div class="hover-image-wrapper">
                                    <div class="hover-content">
                                        <ul>
                                            <li>
                                                <a href="person-details.html" class="btn-social-media"><i class="fa fa-search"></i></a>
                                            </li>

                                        </ul>
                                    </div>
                                    <img src="assets/img/people/smile-2.jpg" class="img-responsive" alt='' />
                                </div>
                            </figure>
                        </div>
                        <div class="team-member-details bg-blue text-center">
                            <h4>John Doe</h4>
                            <h5>PhysioTherapist</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

                        </div>
                        <div class="team-member-links text-center bg-blue-dark">
                            <div class="vs-10"></div>
                            <div>
                                <a href="#" class="btn-social-media"><i class="fa fa-facebook"></i></a><a href="#" class="btn-social-media"><i class="fa fa-twitter"></i></a><a href="#" class="btn-social-media"><i class="fa fa-google-plus"></i></a><a href="#" class="btn-social-media"><i class="fa fa-pinterest"></i></a>
                            </div>
                            <div class="vs-10"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="team-member-wrap">
                        <div class="team-member-img">
                            <figure class="image-overlay">
                                <div class="hover-image-wrapper">
                                    <div class="hover-content">
                                        <ul>
                                            <li>
                                                <a href="person-details.html" class="btn-social-media"><i class="fa fa-search"></i></a>
                                            </li>

                                        </ul>
                                    </div>
                                    <img src="assets/img/people/smile-3.jpg" class="img-responsive" alt='' />
                                </div>
                            </figure>
                        </div>
                        <div class="team-member-details bg-blue text-center">
                            <h4>Jan Doe</h4>
                            <h5>PhysioTherapist</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

                        </div>
                        <div class="team-member-links text-center bg-blue-dark">
                            <div class="vs-10"></div>
                            <div>
                                <a href="#" class="btn-social-media"><i class="fa fa-facebook"></i></a><a href="#" class="btn-social-media"><i class="fa fa-twitter"></i></a><a href="#" class="btn-social-media"><i class="fa fa-google-plus"></i></a><a href="#" class="btn-social-media"><i class="fa fa-pinterest"></i></a>
                            </div>
                            <div class="vs-10"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="team-member-wrap">
                        <div class="team-member-img">
                            <figure class="image-overlay">
                                <div class="hover-image-wrapper">
                                    <div class="hover-content">
                                        <ul>
                                            <li>
                                                <a href="person-details.html" class="btn-social-media"><i class="fa fa-search"></i></a>
                                            </li>

                                        </ul>
                                    </div>
                                    <img src="assets/img/people/smile-4.jpg" class="img-responsive" alt='' />
                                </div>
                            </figure>
                        </div>
                        <div class="team-member-details bg-blue text-center">
                            <h4>Johny Doe</h4>
                            <h5>PhysioTherapist</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

                        </div>
                        <div class="team-member-links text-center bg-blue-dark">
                            <div class="vs-10"></div>
                            <div>
                                <a href="#" class="btn-social-media"><i class="fa fa-facebook"></i></a><a href="#" class="btn-social-media"><i class="fa fa-twitter"></i></a><a href="#" class="btn-social-media"><i class="fa fa-google-plus"></i></a><a href="#" class="btn-social-media"><i class="fa fa-pinterest"></i></a>
                            </div>
                            <div class="vs-10"></div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Team Members -->
    <!-- Dark Bg -->
    <!-- <div class="dark-bg  default-hovered animated-text">
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2>¿Necesitas una cita?</h2>
                        <h2>Reserva hoy mismo!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Dark Bg -->
  @endsection
  <!--Section for project scripts-->
    @section('js')
@endsection