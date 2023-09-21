@extends('layout.layout')
@section('contenido')
<div class="container">
    <div class="row">
     <!--<div class="col-12 text-center">
        <h2>
          Conferencia Internacional <br>"Derecho y Postpandemia: El futuro de un nuevo orden mundial"
        </h2>
        <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
      </div>-->
      <div class="col-lg-12 mx-auto mt-1">
        <div class="card text-center shadow-v3 p-5">
          <h4 class="text-primary">
            
          </h4>
          <p>
              Le agradecemos por su interés en participar en nuestro acompañamiento psicológico. Complete a continuación nuestro formulario de registro.
          </p>
          <p>
            Información Obligatoria <small style="color:red;">*</small>
          </p>
            {!! Form::open(['route' => 'mensajes.store','id' => 'FormInscripcion', 'method' => 'POST', 'class' => 'mt-4']) !!}
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="pull-left">Nombre <small style="color:red;"> *</small></label>
                  <input type="text" class="form-control mr-10" id="nombre" name="nombre" onkeyup= "mayus(this);" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="pull-left">Apellido Paterno<small style="color:red;"> *</small></label>
                    <input type="text" class="form-control "id="paterno" name="paterno" onkeyup= "mayus(this);" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="pull-left">Apellido Materno<small style="color:red;"> *</small></label>
                    <input type="text" class="form-control "id="materno" name="materno" onkeyup= "mayus(this);" required>
                </div>
                <div class="form-group col-md-6">
                  <label class="pull-left">Rut<small style="color:red;"> *</small></label>
                  <input type="text" class="form-control "id="rut" name="rut" maxlength="12" required>
              </div>
                
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="pull-left">Edad <small style="color:red;"> *</small></label>
                <input type="text" class="form-control" id="edad" name="edad" maxlength="2" onKeyPress="return soloNumeros(event)" required>
            </div>
              <div class="form-group col-md-6">
                  <label class="pull-left">Teléfono <small style="color:red;"> *</small></label>
                <input type="text" class="form-control " id="telefono" name="telefono"  onKeyPress="return soloNumeros(event)"  required>
              </div>
          </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="pull-left">Dirección de e-mail <small style="color:red;"> *</small></label>
                  <input type="email" class="form-control " id="correo" name="correo" onkeyup= "mayus(this);"  required>
                </div>
                <div class="form-group col-md-6">
                    <label class="pull-left">Confirmar dirección de e-mail <small style="color:red;"> *</small></label>
                  <input type="email" class="form-control " id="correo2" name="correo2" onkeyup= "mayus(this);"  required>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label class="pull-left">Sede <small style="color:red;"> *</small></label>
                  <select class="form-control" name="sede" id="sede" required>
                      <option value="0">--Seleccione Sede--</option>
                      <option value="Antofagasta">Antofagasta</option>
                      <option value="La Serena">La Serena</option>
                      <option value="Santiago">Santiago</option>
                      <option value="Chillan">Chillan</option>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label class="pull-left">Atención <small style="color:red;"> *</small></label>
                <select class="form-control" name="atencion" id="atencion" required>
                    <option value="0">--Seleccione Atención--</option>
                    <option value="Zoom">Zoom</option>
                    <option value="Meet">Meet</option>
                    <option value="Telefónica">Telefónica</option>
                </select>
            </div>
          </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="pull-left">Tipo <small style="color:red;"> *</small></label>
                    <select class="form-control" name="tipo" id="tipo" required>
                        <option value="0">--Seleccione Tipo--</option>
                        <option value="Docente">Docente</option>
                        <option value="Estudiante">Estudiante</option>
                        <option value="Funcionario">Funcionario</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="pull-left">Jornada de Atención<small style="color:red;"> *</small></label>
                  <select class="form-control" name="jornada" id="jornada" required>
                    <option value="0">--Seleccione Jornada--</option>
                    <option value="Diurna">Diurna (9:30 a 14:00)</option>
                    <option value="Vespertina">Vespertina (18:30 a 22:00)</option>
                </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="pull-left">Motivo de consulta <small style="color:red;"> *</small></label>
                    {{ Form::textarea('comentario', null , ['class' => 'form-control','id' => 'comentario', 'size' => '3x3', 'onkeyup' => "mayus(this);"]) }}
                </div>
            </div>
            <div class="form-row">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="estado" id="condiciones">
              <label class="form-check-label" for="defaultCheck1">
                Acepto Término y Condiciones
              </label>
            </div>
            </div>
            <br>
            <div class="form-group row">
              <div class="col-md-2"></div>
              <div class="col-md-8"><button class="btn btn-primary btn-block" id="InsertDatos">Ingresar Datos</button></div>
              <div class="col-md-2"></div>
            </div>
            {!! Form::close() !!}
        </div>
      </div>
    </div> <!-- END row-->
  </div> <!-- END container-->
@include('condiciones')
@endsection
@section('scripts')
{!! Html::script('js/jquery.Rut.js') !!}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
    $(document).ready(function($){

      $('#rut').Rut({
        on_error: function(){ 
          Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '¡Rut Incorrecto!'
          })
            $('#rut').val(''); 
            },
        format_on: 'keyup'
        });


        $('input:checkbox').on('click', function() {
            chkId = $(this).val();
            if(chkId == 1){
              $('#CondicionesModal').modal({backdrop: 'static', keyboard: false, show: true});
            }

            });
  
      $('#InsertDatos').on('click', function(e) {
      e.preventDefault();
      
      var Nombre = $('#nombre').val();
      var ApellidoPaterno = $('#paterno').val();
      var ApellidoMaterno = $('#materno').val();
      var Email = $('#correo').val();
      var Email2 = $('#correo2').val();
      var Telefono = $('#fono').val();
      var Comentario = $('#mensaje').val();
      var Rut = $('#rut').val();
      var Fono = $('#fono').val();
      var Edad = $('#edad').val();
      var condiciones = $("#condiciones").is(":checked");
        if (!condiciones) {
          toastr.error('Acepte Términos y Condiciones', 'Error!', {timeOut: 3000})
          return false;
        }
     
  
      if(Nombre === '')
      {
        toastr.error('Ingrese un Nombre', 'Error!', {timeOut: 3000})
        return false;
      }

      if(ApellidoPaterno === '')
      {
        toastr.error('Ingrese Apellido Paterno', 'Error!', {timeOut: 3000})
        return false;
      }
      if(ApellidoMaterno === '')
      {
        toastr.error('Ingrese Apellido Materno', 'Error!', {timeOut: 3000})
        return false;
      }
      if(Rut === '')
      {
        toastr.error('Ingrese su rut', 'Error!', {timeOut: 3000})
        return false;
      }
      if($('#sede').val()==0)
        {
      toastr.error('Ingrese una Sede', 'Error!', {timeOut: 3000})
      return false;
        }
        if($('#tipo').val()==0)
        {
      toastr.error('Ingrese un Tipo', 'Error!', {timeOut: 3000})
      return false;
        }
        if($('#atencion').val()==0)
        {
      toastr.error('Ingrese Atención', 'Error!', {timeOut: 3000})
      return false;
        }
        if($('#jornada').val()==0)
        {
      toastr.error('Ingrese la Jornada', 'Error!', {timeOut: 3000})
      return false;
        }
      if(Email === '')
      {
        toastr.error('Ingrese su Email', 'Error!', {timeOut: 3000})
        return false;
      }
      if($('#correo').val().indexOf('@', 0) == -1 || $('#correo').val().indexOf('.', 0) == -1)
        {

      toastr.error('Ingrese Email Valido.', 'Erro!', {timeOut: 3000})
      return false;
      
        }

        if(Email2 === '')
      {
        toastr.error('Confirme su Email', 'Error!', {timeOut: 3000})
        return false;
      }
      if($('#correo2').val().indexOf('@', 0) == -1 || $('#correo2').val().indexOf('.', 0) == -1)
        {

      toastr.error('Ingrese Email Valido.', 'Erro!', {timeOut: 3000})
      return false;
      
        }
      if($('#correo').val().indexOf('@', 0) == -1 || $('#correo').val().indexOf('.', 0) == -1)
        {

      toastr.error('Ingrese Email Valido.', 'Erro!', {timeOut: 3000})
      return false;
      
        }

        if(Email2 != Email || Email != Email2)
      {
        toastr.error('Los Email no coinciden', 'Error!', {timeOut: 3000})
        return false;
      }
      if(Telefono == "")
      {
        toastr.error('Ingrese su Teléfono', 'Error!', {timeOut: 3000})
       return false;
      }

      if(Fono === '')
      {
        toastr.error('Ingrese su Teléfono', 'Error!', {timeOut: 3000})
        return false;
      }

      if(Edad === '')
      {
        toastr.error('Ingrese su Edad', 'Error!', {timeOut: 3000})
        return false;
      }
      
      if(Comentario == "")
      {
        toastr.error('Ingrese un Mensaje', 'Error!', {timeOut: 3000})
       return false;
      }



    
  
          var form = $('#FormInscripcion');
		  var url = form.attr('action');
          

		$.ajax({
		    url: url,
            type: 'POST',
            data: form.serialize(),
            dataType: 'JSON',
                beforeSend: function() {
                   $("#InsertDatos").attr("disabled", true).html('Registrando... <i class="fa fa-refresh fa-spin"></i>');
                },
                success: function(respuesta) {
                   if (respuesta.message == 'success') {
                   	  $("#FormInscripcion")[0].reset();
                       Swal.fire({
                        title: "Gracias!",
                        text: "Tus datos fueron enviados satisfactoriamente, en breve nos pondremos en contacto con usted.",
                        icon: "success"
                      }).then((result) => {
                      if (result) {
                        location.reload();
                      }
                    });
                       
                   }
               }
		});
  
  
    });


  });

         

  function mayus(e) {
    e.value = e.value.toUpperCase();
      }
    function soloNumeros(e)
    {
      var key = window.Event ? e.which : e.keyCode
      return ((key >= 48 && key <= 57) || (key==8))
    }

    
  </script>
@endsection