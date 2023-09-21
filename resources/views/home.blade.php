@extends('layout.admin')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
<p class="lead"> Accesos directos de la aplicación</p>
  <hr class="my-4">
  	<div class="card-deck">
  <div class="card border-primary mb-3" style="max-width: 18rem;">
    <div class="card-header border-primary mb-3" align="center"><i class="fa fa-users" style="font-size:36px"></i></div>
    <div class="card-body text-primary">
      <h5 class="card-title" align="center">Consultas</h5>
      <a href="{{ url('/consultas') }}" class="btn btn-primary btn-lg btn-block"> Ver Consultas</a>
    </div>
</div>
@endsection