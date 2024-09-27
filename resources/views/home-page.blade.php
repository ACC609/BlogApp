<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- FontAwesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{ asset('style.css') }}">

        <title>Resultado de pesquisa</title>
    </head>
    <body>

        <div>
            <!-- Preloader -->
            <div class="preloader d-flex align-items-center justify-content-center">
               <div class="lds-ellipsis">
                   <div></div>
                   <div></div>
                   <div></div>
                   <div></div>
               </div>
           </div>

           <!-- ##### Header Area Start ##### -->
           <header class="header-area">
               <!-- Navbar Area -->
               <div class="oneMusic-main-menu">
                   <div class="classy-nav-container breakpoint-off">
                       <div class="container">
                           <!-- Menu -->
                           <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                               <!-- Nav brand -->
                               <a href="index.html" class="nav-brand"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>

                               <!-- Navbar Toggler -->
                               <div class="classy-navbar-toggler">
                                   <span class="navbarToggler"><span></span><span></span><span></span></span>
                               </div>

                               <!-- Menu -->
                               <div class="classy-menu">

                                   <!-- Close Button -->
                                   <div class="classycloseIcon">
                                       <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                   </div>

                                   <!-- Nav Start -->
                                   <div class="classynav">
                                       <ul>
                                           <li><a href="/">Home</a></li>
                                           <li><a href="{{ route('musica') }}">Músicas</a></li>
                                           <li><a href="#">Albums/Ep's</a></li>
                                           <li><a href="{{ route('noticias') }}">Notícias</a></li>
                                           <li><a href="{{ route('contactos') }}">Contactos</a></li>
                                       </ul>
                                   </div>
                                   <!-- Nav End -->

                               </div>
                           </nav>
                       </div>
                   </div>
               </div>
           </header>
           <!-- ##### Header Area End ##### -->
       </div>

       <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>Vejas as Novidades</p>
            <h2>Resultado de Pesquisas</h2>
        </div>
    </section>

        <div>
            @yield('seacrh')
        </div>


        <div>
            <footer class="footer-area">
                <div class="container">
                    <div class="row d-flex flex-wrap align-items-center">
                        <div class="col-12 col-md-6">
                            <a href="/"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
                            <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            &copy;<script>document.write(new Date().getFullYear());</script> Todos os Direitos Reservados | Este Projecto foi elaborado com <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="#" target="_blank">Adolfo Cabeia</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="footer-nav">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{ route('musica') }}">Músicas</a></li>
                                    <li><a href="#">Albums</a></li>
                                    <li><a href="{{ route('noticias') }}">Notícias</a></li>
                                    <li><a href="{{ route('contactos') }}">Contactos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


         <!-- ##### All Javascript Script ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
        <!-- All Plugins js -->
        <script src="{{asset('js/plugins/plugins.js')}}"></script>
        <!-- Active js -->
        <script src="{{asset('js/active.js')}}"></script>
    </body>

</html>
