@extends('layouts.principal')
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
                    <h1>Welcome to <span class="color-text">PhysiotherapyPro</span> </h1>
                    <p><strong>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna.</strong></p>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <img src="assets/img/blog/5.jpg" class="img-responsive" style="border:5px solid #d9d7d9" />
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->
    <!-- Our Numbers -->
    <section id="our-numbers">
        <div id="our-numbers-4">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center">We have 15 years of experience</h1>
                        <div class="vs-30"></div>
                        <p class="text-center">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum consectetur scelerisque nisl consectetur adipiscing elit </p>
                    </div>
                </div>
                <div class="vs-30"></div>
                <div class="row">
                    <!-- Our Numbers Item -->

                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 our-numbers-item">
                        <p><span class="timer number" id="physiotherapy-delivered" data-to="203" data-speed="3000">203</span></p>
                        <p class="our-numbers-text"> Physiotherapy Delivered</p>

                    </div> <!-- End Our Numbers Item -->
                    <!-- Our Numbers Item -->

                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 our-numbers-item">
                        <p><span class="timer number" id="happy-customers" data-to="1560" data-speed="3000">1560</span></p>
                        <p class="our-numbers-text"> Happy Customers</p>

                    </div> <!-- End Our Numbers Item -->
                    <!-- Our Numbers Item -->

                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 our-numbers-item">
                        <p><span class="timer number" id="massage-therapy" data-to="198" data-speed="3000">198</span></p>
                        <p class="our-numbers-text"> Massage Therapy</p>

                    </div>   <!-- End Our Numbers Item -->
                    <!-- Our Numbers Item -->

                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 our-numbers-item">
                        <p><span class="timer number" id="cups-coffee" data-to="1533" data-speed="3000">1533</span></p>
                        <p class="our-numbers-text"> Cups of Coffee</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Numbers -->
    <!-- Team Members -->
    <div class="team-members">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center color-text">Our Experts</h1>
                    <div class="vs-35"></div>
                </div>
            </div>
            <div class="row">
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
                                    <img src="assets/img/people/smile-1.jpg" class="img-responsive" alt='' />
                                </div>
                            </figure>

                        </div>
                        <div class="team-member-details bg-blue text-center">
                            <h4>Jane Doe</h4>
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
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Members -->
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
    <!-- Clients -->
    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center color-text">Our Clients</h1>
                </div>
            </div>
            <div class="vs-60"></div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="flexslider basic-carousel">
                        <ul class="slides">
                            <li>
                                <img src="assets/img/clients/1.png" />
                            </li>
                            <li>
                                <img src="assets/img/clients/2.png" />
                            </li>
                            <li>
                                <img src="assets/img/clients/3.png" />
                            </li>
                            <li>
                                <img src="assets/img/clients/1.png" />
                            </li>
                            <li>
                                <img src="assets/img/clients/2.png" />
                            </li>
                            <li>
                                <img src="assets/img/clients/3.png" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Clients -->
  @endsection
