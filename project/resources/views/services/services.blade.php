 @section('css')
<link href="{{ asset('assets/css/external/bootstrap.vertical-tabs.css') }}" rel="stylesheet">
    @endsection
@extends('layouts.principal')
    @section('content')
    <!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center">Servicios</h1>
        </div>
    </section>
    <!-- End Section Title -->
    <!-- Services -->
    <section id="services">
        <div class="container">
            <div class="row tab-style-2">
                <div class="col-md-3 col-xs-12 col-sm-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#physiotherapy" data-toggle="tab"><span class="icon-i-physical-therapy"></span>&nbsp;Physiotherapy</a></li>
                        <li><a href="#acupuncture" data-toggle="tab"><span class="icon-i-alternative-complementary"></span>&nbsp;Acupuncture</a></li>
                        <li><a href="#orthopedic-bracing" data-toggle="tab"><span class="icon-i-outpatient"></span>&nbsp;Orthopedic Bracing</a></li>
                        <li><a href="#sports-injury" data-toggle="tab"><span class="icon-i-ambulance"></span>&nbsp;Sports Injury</a></li>
                        <li><a href="#rehabilitation" data-toggle="tab"><span class="icon-i-health-education"></span>&nbsp;Rehabilitation</a></li>
                        <li><a href="#physical-theraphy" data-toggle="tab"><span class="icon-i-intensive-care"></span>&nbsp;Physical Theraphy</a></li>
                    </ul>
                </div>

                <div class="col-md-9 col-xs-12 col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="physiotherapy">
                            <div>
                                <h3 class="text-center color-text">Physiotherapy</h3>
                                <div class="vs-25"></div>
                                <p><img src="assets/img/blog/1.jpg" class="img-responsive" />Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="acupuncture">
                            <h3 class="text-center color-text">Acupuncture</h3>
                            <div class="vs-25"></div>
                            <p><img src="assets/img/blog/4.jpg" class="img-responsive" />Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                        </div>
                        <div class="tab-pane" id="orthopedic-bracing">
                            <h3 class="text-center color-text">Orthopedic Bracing</h3>
                            <div class="vs-25"></div>
                            <p><img src="assets/img/blog/5.jpg" class="img-responsive" />Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                        </div>
                        <div class="tab-pane" id="sports-injury">
                            <h3 class="text-center color-text">Sports Injury</h3>
                            <div class="vs-25"></div>
                            <p><img src="assets/img/blog/2.jpg" class="img-responsive" />Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                        </div>
                        <div class="tab-pane" id="rehabilitation">
                            <h3 class="text-center color-text">Rehabilitation</h3>
                            <div class="vs-25"></div>
                            <p><img src="assets/img/blog/3.jpg" class="img-responsive" />Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                        </div>
                        <div class="tab-pane" id="physical-theraphy">
                            <h3 class="text-center color-text">Physical Theraphy</h3>
                            <div class="vs-25"></div>
                            <p><img src="assets/img/blog/1.jpg" class="img-responsive" />Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->
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
    <!-- Appointment -->
    <section id="appointment">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Make An Appointment</h1>
                    <div class="vs-35">
                    </div>
                    <p class="text-center">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna. Donec sed odio dui.</p>
                </div>
            </div>
            <div class="vs-35">   </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <img class="img-responsive" src="assets/img/blog/3.jpg" />
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
   @endsection