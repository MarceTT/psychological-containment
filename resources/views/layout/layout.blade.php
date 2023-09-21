<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from echotheme.com/educati/index-one-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Apr 2020 05:25:02 GMT -->
<head>
    <meta charset="UTF-8">
    
    <!-- Title-->
    <title>Consulta  Universidad del Alba</title>
    
    <!-- SEO Meta-->
    <meta name="description" content="Education theme by EchoTheme">
    <meta name="keywords" content="Universadidad Pedro de Valdivia">
    <meta name="author" content="education">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- viewport scale-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
            
    <!-- Favicon and Apple Icons-->
    <link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
	<link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />
    
    
    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">
    
    
    <!-- Icon fonts -->
    <link rel="stylesheet" href="/template/assets/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="/template/assets/fonts/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <!-- stylesheet-->    
    <link rel="stylesheet" href="/template/assets/css/vendors.bundle.css">
    <link rel="stylesheet" href="/template/assets/css/style.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
      .imagen {
        width: 100%;
        height: 450px;
        background:url('/img/landing.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
      }
      @media only screen and (min-device-width: 400px) {
        .imagen {
        width: 100%;
        height: 450px;
        background:url('/img/landing.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
      }
    }
    </style>
    
  </head>
  
  <body>
   

  <header class="site-header bg-dark text-white-0_5">        
    <div class="container">
      <div class="row align-items-center justify-content-between mx-0">
        <ul class="list-inline d-none d-lg-block mb-0">
          <li class="list-inline-item mr-3">
           <div class="d-flex align-items-center">
            <i class="ti-email mr-2"></i>
            <a href="mailto:consulta.psicologica@udalba.cl">consulta.psicologica@udalba.cl</a>
           </div
          </li>
          <li class="list-inline-item mr-3">
           <div class="d-flex align-items-center">
            <i class="ti-headphone mr-2"></i>
            <a href="tel:600 500 5500">600 500 5500</a>
           </div>
          </li>
        </ul>
        <ul class="list-inline mb-0">
          <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
            <a href="https://m.facebook.com/udelalba/" target="_blank"><i class="ti-facebook"></i></a>
          </li>
          <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
            <a href="https://twitter.com/Udalba_Chile" target="_blank"><i class="ti-twitter"></i></a>
          </li>
          <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
            <a href="https://www.youtube.com/channel/UCtzb8MOdja78kFHQz9Th1Gw/featured" target="_blank"><i class="ti-youtube"></i></a>
          </li>
          <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
            <a href="https://www.instagram.com/udalba/?utm_medium=copy_link" target="_blank"><i class="ti-instagram"></i></a>
          </li>
        </ul>
      </div> <!-- END END row-->
    </div> <!-- END container-->
  </header><!-- END site header-->
  
  

  <nav class="ec-nav sticky-top bg-white">
  <div class="container">
    <div class="navbar p-0 navbar-expand-lg">
      <div class="navbar-brand">
        <a class="logo-default" href="https://www.upv.cl/" target="_blank"><img alt="" src="{{ asset('logo-menu.png') }}"></a>
      </div>
      <!--<span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible" data-toggle="collapse">
        <div class="hamburger hamburger--spin js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </span>-->
      <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">

      </div>
  </div> <!-- END container-->		
  </nav> <!-- END ec-nav -->    

  <div class="site-search">
   <div class="site-search__close bg-black-0_8"></div>
   <form class="form-site-search" action="#" method="POST">
    <div class="input-group">
      <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
      </div>
    </div>
   </form> 
  </div> <!-- END site-search-->



  <section>
    <img class="w-100" src="/img/Banner-Contencion-psicologica.jpg">
  </section>




  <section class="padding-y-10">


    @yield('contenido')
   
  </section>
  
  
    



   
<footer class="site-footer">
    <div class="footer-top bg-white text-white-0_6 pt-5 paddingBottom-100">
      <div class="container"> 
        <div class="row">
  
          <div class="col-lg-5 col-md-6 mt-5">
           <img src="{{ asset('logo-menu.png') }}" alt="Logo">
           <div class="margin-y-40">
             <!--<p>
              Nunc placerat mi id nisi interdm they mtolis. Praesient is haretra justo ught scel erisque placer.
            </p>-->
           </div>
            <ul class="list-inline"> 
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" style="background-color:#000;" href="https://m.facebook.com/udelalba/" target="_blank"><i class="ti-facebook"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="https://twitter.com/Udalba_Chile" target="_blank"><i class="ti-twitter"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="https://www.youtube.com/channel/UCtzb8MOdja78kFHQz9Th1Gw/featured" target="_blank"><i class="ti-youtube"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="https://www.instagram.com/udalba/?utm_medium=copy_link" target="_blank"><i class="ti-instagram"></i></a></li>
            </ul>
          </div>
  
          <div class="col-lg-6 col-md-6 mt-5">
            <h4 class="h5 text-white">Contáctanos</h4>
            <div class="width-3rem  height-3 mt-3" style="background-color:#000;"></div>
            <ul class="list-unstyled marginTop-40">
              <li class="mb-3"><i class="ti-headphone mr-3"></i><a href="tel:600 500 5500">600 500 5500 </a></li>
              <li class="mb-3"><i class="ti-email mr-3"></i><a href="mailto:consulta.psicologica@udalba.cl">consulta.psicologica@udalba.cl</a></li>
              <li class="mb-3">
               <div class="media">
                <i class="ti-location-pin mt-2 mr-3"></i>
                <div class="media-body">
                  <span> Casa Central – Santiago Av. Ejército Libertador desde el 171 al 177</span>
                </div>
               </div>
              </li>
            </ul>
          </div>
        </div> <!-- END row-->
      </div> <!-- END container-->
    </div> <!-- END footer-top-->
  
    <div class="footer-bottom bg-black-0_9 py-5 text-center">
      <div class="container">
        <p class="text-white-0_5 mb-0">&copy; 2020 Universidad del Alba </p>
      </div>
    </div>  <!-- END footer-bottom-->
  </footer> <!-- END site-footer -->



<div class="scroll-top">
  <i class="ti-angle-up"></i>
</div>

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js') !!}
    <script src="{{ asset('js/app.js') }}"></script>
    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') !!}
    {!! Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js') !!}
    @yield('scripts')
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js') !!}
    
    
  </body>

<!-- Mirrored from echotheme.com/educati/index-one-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Apr 2020 05:25:36 GMT -->
</html>