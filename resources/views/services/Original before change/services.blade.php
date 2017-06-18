 @section('external-css')
     <link href="{{ asset('assets/css/external/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/external/wfmi-style.css') }}" rel="stylesheet">
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
                    <input type="button" onclick="cargamensaje()" value="Activar Función">
                   
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#physiotherapy" data-toggle="tab"><span class="icon-i-physical-therapy"></span>&nbsp;Physiotherapy</a></li>

                        <li><a href="#muestradatos" data-toggle="tab"><span class="icon-i-intensive-care"></span>&nbsp;Mostrar Datos</a></li>
                        <li><a href="#insertadatos" data-toggle="tab"><span class="icon-i-intensive-care"></span>&nbsp;Insertar datos</a></li>
                        <li><a href="#actualizardatos" data-toggle="tab"><span class="icon-i-intensive-care"></span>&nbsp;Actualizar datos</a></li>

                        <li><a href="#agregaServicio" data-toggle="tab"><span class="icon-facebook"></span>&nbsp;Agregar Servicio</a></li>


                        <li><a href="#acupuncture" data-toggle="tab"><span class="icon-i-alternative-complementary"></span>&nbsp;Acupuncture</a></li>
                        
                    </ul>
                </div>

                <div class="col-md-9 col-xs-12 col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div class="tab-pane" id="muestradatos">
                            <h3 class="text-center color-text">Carga de datos</h3>
                            <div class="vs-25"></div>
                            <p><img src="assets/img/blog/5.jpg" class="img-responsive" />Base para cargar datos</p>
                               
                                <!-- Desplegar información obtenida de servicios-->
                                <div class="table-responsive">
                                    @if($data)
                                    <table class="table">
                                        <thead>                                        
                                        <tr>
                                            <td>nombre</td>
                                            <td>descripción</td>
                                            <td>precio</td>
                                        </tr>    
                                        </thead>
                                            @foreach($data as $row)
                                            <tr>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->description}}</td>
                                                <td>{{$row->price}}</td>
                                                <td>
                                                    <a href="{{ route('services.edit',$row->id)}}" class="btn btn-info">Editar</a>
                                                    
                                                    <form action="{{ route('services.destroy', $row->id) }}" method="post">
                                                        <input name="_method" type="hidden" value="DELETE"/>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        
                                    </table>
                                    @endif
                                    
                                </div>
                                <!-- Fin de Desplegar información optenida de servicios-->                        
                        </div>

                        <div class="tab-pane" id="insertadatos">
                            
                            <h4><a href="#muestradatos" data-toggle="tab">Mostrar Datos</a></h4>
                            
                             <form method="post" action="\services">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!--Token de seguridad-->
                                
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre"/>
                                </div>

                                <div class="form-group">
                                    <label for="">Descripción</label>
                                    <input type="text" name="description" class="form-control" placeholder="Descripción"/>
                                </div>

                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input type="text" name="price" class="form-control" placeholder="Precio"/>
                                </div>

                                    
                                <button type="submit" class="btn btn-default">Guardar</button>
                            </form>                   
                        </div>


                        <div class="tab-pane" id="actualizardatos">
                            
                            <h4><a href="#muestradatos" data-toggle="tab">Mostrar Datos</a></h4>
                        
                              <form action="{{ route('services.edit', $row->id) }}" method="post">     
       
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{$row->name}}"/>
                                </div>

                                <div class="form-group">
                                    <label for="">Descripción</label>
                                    <input type="text" name="description" class="form-control" placeholder="Descripción" value="{{$row->description}}"/>
                                </div>

                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input type="text" name="price" class="form-control" placeholder="Precio" value="{{$row->price}}"/>
                                </div>

                                    
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </form>
                        
                        </div>

                        <div class="tab-pane active" id="physiotherapy">
                            <div>
                                <h3 class="text-center color-text">Physiotherapy</h3>
                                <div class="vs-25"></div>
                                <p><img src="assets/img/blog/1.jpg" class="img-responsive" />Se almacenan datos</p>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Praesent commodo cursus magna. Donec sed odio dui.</p>
                                
                            </div>
                        </div>
                        
                        <div class="tab-pane active" id="agregaServicio">
                            <div>
                                <h3 class="text-center color-text">Physiotherapy</h3>
                                <div class="vs-25"></div>
                                <p><img src="assets/img/blog/1.jpg" class="img-responsive" />Se almacenan datos</p>
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

                        <div class="tab-pane" id="depilacion">
                            <h3 class="text-center color-text">Depilación</h3>
                            <div class="vs-25"></div>
                            <p><img src="assets/img/blog/1.jpg" class="img-responsive" />Texto informativo</p>
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

@endsection
   
   @section('js')
        <script src="{{ asset('assets/js/project/script.js') }}"></script>
        <script src="{{ asset('assets/js/project/load-Services.js') }}"></script>
    @endsection
