

<!DOCTYPE html>
<html>
   <head>
      <title>Glow</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale = 1.0,
         maximum-scale=1.0, user-scalable=no" />
      <!--Core Styles-->
      <link href="{{ asset('assets/css/core/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/external/font-awesome.min.css') }}" rel="stylesheet">
      <!--External Styles-->
      @section('external-css')
      @show
      <link href="{{ asset('css/external/toastr.css') }}" rel="stylesheet">
      <!--Project Styles-->
      <link href="{{ asset('assets/css/project/style.css') }}" rel="stylesheet">
      <!--Google Web Fonts-->
      <link href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700%7CRaleway:400,700') }}" rel="stylesheet">
   </head>
   <body>
      <!-- Preloader -->
      <div id="preloader">
         <div id="status">
            &nbsp;
         </div>
      </div>
      <!-- End Preloader -->
      <!--Header Intro-->
      <div class="header-intro visible-lg">
         <div class="container pt-0 pb-0 ">
            <div class="header-intro-section">
               <div class="icon-box">
                  <table>
                     <tr>
                        <td><i class="fa fa-clock-o"></i></td>
                        <td>
                           <div class="icon-box-text">
                              Lun - Vie 9:00 am-12:00 | pm 1:00 pm-7:00 pm<br />
                              Domingos Cerrado
                           </div>
                        </td>
                     </tr>
                  </table>
               </div>
               <div class="icon-box">
                  <table>
                     <tr>
                        <td><i class="fa fa-envelope-o"></i></td>
                        <td>
                           <div class="icon-box-text">
                              clinica.glow.cr@gmail.com
                           </div>
                        </td>
                     </tr>
                  </table>
               </div>
               <div class="icon-box pull-right">
                  <table>
                     <tr>
                        <td><i class="fa fa-smile-o"></i></td>
                        <td>
                           <div class="icon-box-text">
                              Te esperamos!
                           </div>
                        </td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="header-intro-2">
         <div class="container pt-0 pb-0">
            <div class="row ml-0 mr-0">
               <div class="col-lg-4 visible-lg"><img src="{{ asset('assets/img/logo/logo.png') }}" class="img-responsive" alt="logo" /></div>
               <div class="col-md-12 col-lg-8 pl-0 pr-0">
                  <!-- Main Menu -->
                  <div id="main-menu">
                     <div class="navbar yamm navbar-default" role="navigation">
                        <div class="container pt-0 pb-0">
                           <!-- Brand and toggle get grouped for better mobile display -->
                           <div class="navbar-header visible-xs">
                              <div class="col-lg-2"><img src="{{ asset('assets/img/logo/logo.png') }}" class="img-responsive" alt="logo" /></div>
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu-navbar">
                              <span class="sr-only">
                              Toggle navigation
                              </span>
                              <span class="icon-bar">
                              </span>
                              <span class="icon-bar">
                              </span>
                              <span class="icon-bar">
                              </span>
                              </button>
                           </div>
                           <div class="collapse navbar-collapse" id="main-menu-navbar">
                              <ul class="nav navbar-nav pull-right">
                                 <li><a href="/">Inicio</a></li>
                                 <li><a href="appointment">Cita</a></li>
                                  @if (!Auth::guest()) @if((Auth::user()->role_id)==1)
                                   <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administración
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                       <li><a href="{{ asset('users') }}">Usuarios</a></li>
                                       <li><a href="{{ asset('news') }}">Anuncios</a></li>
                                       <li><a href="{{ asset('services') }}">Servicios</a></li>
                                       <li><a href="{{ asset('products') }}">Productos</a></li>
                                    </ul>
                                 </li>
                                 
                                 @endif
                                 
                                 @else
                                    <li><a href="{{ asset('news') }}">Anuncios</a></li>
                                    <li><a href="{{ asset('services') }}">Servicios</a></li>
                                    <li><a href="{{ asset('products') }}">Productos</a></li>
                                 @endif
                                 
                                 
                                 
                                
                                 <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Información <i class="fa fa-caret-down" aria-hidden="false"></i></a>
                                    <ul class="dropdown-menu">
                                       <li><a href="{{ asset('contact') }}">Contacto</a></li>
                                       <li><a href="{{ asset('abaut') }}">Nosotros</a></li>
                                       
                                    </ul>
                                 </li>
                                 @if (Auth::guest())
                                 <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                       <li><a href="{{ asset('login') }}"> Ingresar</a></li>
                                       <li><a href="{{ asset('register') }}"> Registrarme</a></li>
                                    </ul>
                                 </li>
                                 @else
                                 <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">@if (!Auth::guest()) {{ Auth::user()->name }} @endif <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                       <li>
                                          <a href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                          Salir
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                          </form>
                                       </li>
                                    </ul>
                                 </li>
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Main Menu -->
               </div>
            </div>
         </div>
      </div>
      <!--End Header Intro-->
      @yield('content')
      <!-- Footer -->
      <footer class="bg-blue-3">
         <div class="container pb-0">
            <div class="row">
               <div class="col-md-3 col-xs-12 col-sm-6">
                  <h3>Acerca de FisioEstética Glow</h3>
                  <p>Cuidado profesional de su salud y belleza corporal. Le ofrece los mejores tratamientos estéticos y terapéuticos en un ambiente cálido y personalizado.</p>
               </div>
               <div class="col-md-3 col-xs-12 col-sm-6">
                  <h3> Servicios Brindados</h3>
                  <ul class="provided-services">
                     <li><a href="#">Belleza</a></li>
                     <li><a href="#">Cósmetica</a></li>
                     <li><a href="#">Cuidado Personal</a></li>
                  </ul>
                  <ul class="provided-services">
                     <li><a href="#">Terapéuticos</a></li>
                     <li><a href="#">Tratamientos estéticos</a></li>
                  </ul>
               </div>
               <div class="col-md-3 col-xs-12 col-sm-6">
                  <h3>Contactenos</h3>
                  <p>
                     Dirección: Alajuela, Grecia, 25 sur de los bomberos.<br />
                     Teléfono: (+506) 8814-01 36 // 24 94 0108<br />
                     Correo: info@site.com
                  </p>
               </div>
               <div class="col-md-3 col-xs-12 col-sm-6">
                  <h3>Horario</h3>
                  <p>
                     Lun - Vie 9:00 am-12:00 | pm 1:00 pm-7:00 pm<br />
                     Domingos Cerrado
                  </p>
               </div>
            </div>
            <div class="row">
               <hr />
            </div>
            <div class="row">
               <div class="footer-inner-wrap">
                  <div class="footer-inner">
                     <div class="col-lg-12">
                        <p class="text-center">&copy;2017 Todos los derechos resevados|Glow</p>
                        <p class="text-center">
                           <a href="https://www.facebook.com/Cl%C3%ADnica-FisioEst%C3%A9tica-Glow-109629109054741/" target="_blank" class="btn-social-media"><i class="fa fa-facebook"></i></a><a href="#" class="btn-social-media"><i class="fa fa-twitter"></i></a><a href="#" class="btn-social-media"><i class="fa fa-google-plus"></i></a>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- End Footer -->
      <!-- Go Back Top-->
      <section id="go-back-top">
         <a class="scroll" href="#main-menu">
         <i class="fa fa-angle-up"></i>
         </a>
      </section>
      <!-- End Go Back Top-->
      <!--Core Scripts-->
      <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
      <!--External Scripts-->
      @section('external-js')
      @show
      <script src="{{ asset('assets/js/project/general-script.js') }}"></script>
      <script src="{{ asset('js/external/toastr.min.js') }}"></script>
      <!--Project Scripts-->
      @section('js')
      @show
   </body>
</html>

