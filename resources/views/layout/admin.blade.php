<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2019 21:22:08 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
	<link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />

    <title>Contención Psicológica Universidad del Alba</title>

    <!-- Bootstrap core CSS -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/bootstrap-reset.css" rel="stylesheet">


    <!--external css-->
    <link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/admin/css/owl.carousel.css" type="text/css">

    {!! Html::style('/css/app.css') !!}
    {!! Html::style('/css/main.css') !!}
    {!! Html::style('https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}

    {!! Html::style('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') !!}

    <!--DATATABLES-->
   {!! Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css') !!}




    <style>
  
        #calendar {
          max-width: 1100px;
          margin: 0 auto;
        }
      
      </style>

  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #041E42;">
        <a class="navbar-brand" href="#"><img alt="" src="{{ asset('logo-menu.png') }}" height="40px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ request()->is('consultas') ? 'active' : ''}}">
              <a class="nav-link" href="{{ url('/consultas') }}">Ver Horas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ request()->is('calendario') ? 'active' : ''}}">
              <a class="nav-link" href="{{ url('/calendario') }}">Ver Calendario <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::user()->type == "admin")
            <li class="nav-item {{ request()->is('usuarios') ? 'active' : ''}}">
              <a class="nav-link" href="{{ url('/usuarios') }}">Usuarios</a>
            </li>
            @endif
            <!--<li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>-->
          </ul>
          <div class="btn-group col-sm-3">

            <ul class="navbar-nav mr-auto">
                     <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user-circle"></i>
                   {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="Preview">
                <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>    Cerrar Sesion</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                  </div>
                  </li>
            
            </ul>
            </div>
        </div>
      </nav>
      <br>


    <div class="container">
        @yield('content')
    </div>


    {!! Html::script('js/jquery.js') !!}
    <script src="{{ asset('js/app.js') }}"></script>
    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') !!}
    {!! Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js') !!}
    {!! Html::script('https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js') !!}
    

   <!--SCRIPT DATATABLE-->
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js') !!}

    @yield('scripts')

     

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2019 21:22:43 GMT -->
</html>
