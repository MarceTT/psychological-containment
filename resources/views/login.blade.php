<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2019 21:22:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
	<link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />

    <title>Admin Cursos</title>

    <!-- Bootstrap core CSS -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/admin/css/style.css" rel="stylesheet">
    <link href="/admin/css/style-responsive.css" rel="stylesheet" />


</head>
  <body class="login-body">
    <div class="container">
 <form method="POST" action="{{ route('login') }}" class="form-signin">
                        @csrf
        <h2 class="form-signin-heading" style="background: #041E42;"><img src="{{ asset('logo-menu.png') }}" class="img-responsive" width="180px" height="40px"></h2>
        <div class="login-wrap">
            <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" placeholder="Usuario" autofocus>
                @if ($errors->has('usuario'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('usuario') }}</strong>
                    </span>
                @endif
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            <button class="btn btn-lg btn-shadow btn-success btn-block" type="submit">Entrar</button>
        </div>
        @if($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
      </form>
    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/admin/js/jquery.js"></script>
    <script src="/admin/js/bootstrap.bundle.min.js"></script>


  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2019 21:22:57 GMT -->
</html>
