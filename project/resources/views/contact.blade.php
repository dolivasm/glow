@extends('layouts.principal')
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
                                <h1 class="text-center color-text"><i class="fa fa-map-o"></i> &nbsp; Contact</h1>
                            </div>
                            <div class="vs-25"></div>
                            <div class="seperator-text">
                                <p>Sed porttitor, justo in feugiat mollis, nunc velit luctus purus, in commodo nisi magna ut sa. </p>
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
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12042.38341328123!2d28.962356227081358!3d41.01221819455958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab9eb9d587135%3A0x8aa0bb6b1dd6ffb7!2zRW1pbsO2bsO8LCBSw7xzdGVtIFBhxZ9hLCAzNDExNiBGYXRpaC_EsHN0YW5idWw!5e0!3m2!1str!2str!4v1464594595424" width="800" height="445" style="border:0; pointer-events:none" allowfullscreen class="embed-responsive-item "></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-details-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="contact-details">
                                    <h3 class="color-text">Acerca de FisioEstética Glow</h3>
                                    <p>Cuidado profesional de su salud y belleza corporal. Le ofrece los mejores tratamientos estéticos y terapéuticos en un ambiente cálido y personalizado.</p>
                                    <div class="company-meta">
                                        <div class="width-half">
                                            <h3>
                                                <span>
                                                    <i class="fa fa-map-marker"></i>
                                                </span> Nuestras Oficinas
                                            </h3>
                                            <p>
                                                Alajuela, Grecia

                                                <br> 25 sur de los bomberos.
                                            </p>
                                           
                                        </div>
                                        <div class="width-half">
                                            <h3>
                                                <span>
                                                    <i class="fa fa-comment-o"></i>
                                                </span> Información de Contacto
                                            </h3>
                                            <p>
                                                <abbr>Correo:</abbr><a href="mailto:info@company.com" class="link"> info@company.com</a>
                                            </p>
                                            <p>
                                                <abbr>Teléfono:</abbr>  (+506) 8814-01 36 // 24 94 0108
                                            </p>
                                          
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="contact-form">
                                    <h3 class="color-text">Dejanos tus consultas</h3>
                                    <p>Cuidado profesional de su salud y belleza corporal.</p>
                                    <!-- Contact Form -->
                                    <form id="contact-form" action="post">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <input id="contact-name" class="form-control" name="contact-name" required="" placeholder="Nombre" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <input id="contact-email" class="form-control" name="contact-email" required="" placeholder="Correo" type="email">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <input id="contact-subject" name="contact-subject" class="form-control" required="" placeholder="Asunto" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <textarea id="contact-message" class="form-control" name="contact-message" rows="6" placeholder="Mensaje"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <button class="btn btn-normal btn-block" id="contact-send"><i class="fa fa-envelope-o fa-2x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
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
    <!-- Callout -->
    <section id="callout" class="bg-alternative visible-lg">

        <div class="well">
            <div class="container pt-35 pb-35">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callout-wrap">
                            <h4>"Si la medicina es la ciencia que da años a la vida, la Fisioterapia es la ciencia que da vida a los años" <a href="appointment" class="btn btn-normal btn-lg pull-right"><i class="icon-i-registration"></i> Reservar Cita</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @endsection