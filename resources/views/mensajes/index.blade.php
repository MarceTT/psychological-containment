@extends('layout.admin')
@section('content')
<div class="card mb-3" style="border-color: #E0004D;">
    <div class="card-header" style="background-color: #041E42; color: #fff;">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active"  data-toggle="pill" href="#citas-solicitadas" role="tab" aria-selected="true" onClick="ActualizaTabla();">Horas Solicitadas </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" data-toggle="pill" href="#citas-agendadas" role="tab" aria-selected="false"> Horas Agendadas </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" data-toggle="pill" href="#citas-atendidas" role="tab" aria-selected="false">Horas Atendidas</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" data-toggle="pill" href="#citas-epicrisis" role="tab" aria-selected="false">Sesiones con epicrisis</a>
        </li>
      </ul>
      </div>
      <div class="card-body">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="citas-solicitadas" role="tabpanel">
          <br>
          <div class="table-responsive">
            <table class="table inicial" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Apellido</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Email</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Fecha Ingreso</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Estado</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Acciones</th>
            </tr>
          </thead>
        </table>
        </div>
        </div>
        <div class="tab-pane fade" id="citas-agendadas" role="tabpanel">
          <br>
          @include('mensajes.agendadas')
        </div>
        <div class="tab-pane fade" id="citas-atendidas" role="tabpanel">
          <br>
          @include('mensajes.atendidas')
        </div>
        <div class="tab-pane fade" id="citas-epicrisis" role="tabpanel">
          <br>
          @include('mensajes.epicrisis')
        </div>
      </div>
    </div>
</div>
@include('mensajes.seguimiento')
@include('mensajes.datos')
@include('agenda.agendar')
@include('agenda.agendar-nuevo')
@endsection
@section('scripts')
{!! Html::script('https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js') !!}
{!! Html::script('js/jquery.Rut.js') !!}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
    $(document).ready(function($){
		$('.inicial').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        'processing' : true,
    		'serverSide' : true,
    		'ajax' : '/consultas/table',
    		'columns' : [
    			{data: 'nombre', name: 'nombre'},
    			{data: 'apellido_paterno', name: 'apellido_paterno'},
          {data: 'email', name: 'email'},
          {data: 'created_at', name: 'created_at'},
          {data: 'estado', name: 'estado'},
    	    {data: 'acciones', name: 'acciones',orderable: false, searchable: false},

    		]

        });
        $('.inicial').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
      $('.agendada').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
        });
        $('.agendada').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
    $('.atendidas').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
         order: [3, 'desc']
    });
    $('.atendidas').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
  });
  var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#fecha').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy',
            minDate: today
        });

    var Mostrar = function(id)
{
  var ruta = "consultas/"+id;
  $('#DetalleMensajeModal').modal({backdrop: 'static', keyboard: false, show: true});
  $.get(ruta, function(data){
      $('#nombre').html(data.nombre);
      $('#paterno').html(data.apellido_paterno);
      $('#materno').html(data.apellido_materno);
      $('#rut').html(data.rut);
      $('#direccion').html(data.direccion);
      $('#correo').html(data.email);
      $('#fono').html(data.telefono);
      $('#sede').html(data.sede);
      $('#tipo').html(data.tipo);
      $('#edad').html(data.edad);
      $('#mensaje').html(data.motivo);
  });

 
}

var Detalles = function(id,rut,estado,epicrisis)
{
  var ruta = "consultas/"+id+"/edit";
  $.get(ruta, function(data){
  $('#DetallesModal').modal({backdrop: 'static', keyboard: false, show: true});
  $('#id').val(data.id);
    $('#nombres').val(data.nombre).prop( "readonly", true );
    $('#paternos').val(data.apellido_paterno).prop( "readonly", true );
    $('#maternos').val(data.apellido_materno).prop( "readonly", true );
    $('#rut2').val(data.rut).prop( "readonly", true );
    $('#jornadas').val(data.jornada).prop( "readonly", true );
    $('#edades').val(data.edad).prop( "readonly", true );
    $('#telefonos').val(data.telefono).prop( "readonly", true );
    $('#correos').val(data.email).prop( "readonly", true );
    $('#correo2').val(data.email).prop( "readonly", true );
    $('#comentarios').val(data.motivo).prop( "readonly", true );
    $('#sedes option[value="'+data.sede+'"]').prop("selected", true);
    $('#tipos  option[value="'+data.tipo+'"]').prop("selected", true);
    $('#fecha').val('');
    $('#hora').val('');
    $('#usuarios').val('');
    if(data.sicologo_id == '0'){
      $('#EditDatos').show();
      $('#btnSeguimiento').hide();
    }else{
      $('#usuarios  option[value="'+data.sicologo_id+'"]').prop("selected", true);
      $('#fecha').val(data.fecha).prop( "readonly", true );
      $('#hora').val(data.hora).prop( "readonly", true );
      $('#EditDatos').hide();
      $('#btnSeguimiento').show();

    }
    $('#atenciones  option[value="'+data.atencion+'"]').prop("selected", true);
    $('#requerimiento').val(data.id);
    var id_llamada = data.id;
    
  if(data.estado == 3){
      $('#btnSeguimiento').hide();
    }
    if(data.estado == 1){
      $('#Seguimiento').hide();
      $('#Reagenda').hide();
    }
    if(data.estado == 2){
      $('#nombres').val(data.nombre).prop( "readonly", true );
      $('#paternos').val(data.apellido_paterno).prop( "readonly", true );
      $('#maternos').val(data.apellido_materno).prop( "readonly", true );
      $('#rut2').val(data.rut).prop( "readonly", true );
      $('#jornadas').val(data.jornada).prop( "readonly", true );
      $('#edades').val(data.edad).prop( "readonly", true );
      $('#telefonos').val(data.telefono).prop( "readonly", true );
      $('#correos').val(data.email).prop( "readonly", true );
      $('#correo2').val(data.email).prop( "readonly", true );
      $('#comentarios').val(data.motivo).prop( "readonly", true );
      $('#sedes option[value="'+data.sede+'"]').prop("selected", true);
      $('#tipos  option[value="'+data.tipo+'"]').prop("selected", true);
      $('#usuarios  option[value="'+data.sicologo_id+'"]').prop("selected", true);
      document.getElementById("usuarios").disabled = true;
      $('#fecha').val(data.fecha).prop( "readonly", true );
      $('#hora').val(data.hora).prop( "readonly", true );
      $('#Seguimiento').show();
      $('#Mensajes').hide();
      var rut = data.rut;
    }
    if(data.estado == 3){
      $('#nombres').val(data.nombre).prop( "readonly", true );
      $('#paternos').val(data.apellido_paterno).prop( "readonly", true );
      $('#maternos').val(data.apellido_materno).prop( "readonly", true );
      $('#rut2').val(data.rut).prop( "readonly", true );
      $('#jornadas').val(data.jornada).prop( "readonly", true );
      $('#edades').val(data.edad).prop( "readonly", true );
      $('#telefonos').val(data.telefono).prop( "readonly", true );
      $('#correos').val(data.email).prop( "readonly", true );
      $('#correo2').val(data.email).prop( "readonly", true );
      $('#comentarios').val(data.motivo).prop( "readonly", true );
      $('#sedes option[value="'+data.sede+'"]').prop("selected", true);
      $('#tipos  option[value="'+data.tipo+'"]').prop("selected", true);
      $('#usuarios  option[value="'+data.sicologo_id+'"]').prop("selected", true);
      $('#fecha').val(data.fecha).prop( "readonly", true );
      $('#hora').val(data.hora).prop( "readonly", true );
      document.getElementById("usuarios").disabled = true;
      $('#Seguimiento').show();
      $('#btnSeguimiento').hide();
      $('#Mensajes').hide();
      $('#Reagenda').hide();

    }

    if(data.estado == 4){
      $('#nombres').val(data.nombre).prop( "readonly", true );
      $('#paternos').val(data.apellido_paterno).prop( "readonly", true );
      $('#maternos').val(data.apellido_materno).prop( "readonly", true );
      $('#rut2').val(data.rut).prop( "readonly", true );
      $('#jornadas').val(data.jornada).prop( "readonly", true );
      $('#edades').val(data.edad).prop( "readonly", true );
      $('#telefonos').val(data.telefono).prop( "readonly", true );
      $('#correos').val(data.email).prop( "readonly", true );
      $('#correo2').val(data.email).prop( "readonly", true );
      $('#comentarios').val(data.motivo).prop( "readonly", true );
      $('#sedes option[value="'+data.sede+'"]').prop("selected", true);
      $('#tipos  option[value="'+data.tipo+'"]').prop("selected", true);
      $('#usuarios  option[value="'+data.sicologo_id+'"]').prop("selected", true);
      $('#fecha').val(data.fecha).prop( "readonly", true );
      $('#hora').val(data.hora).prop( "readonly", true );
      document.getElementById("usuarios").disabled = true;
      $('#Seguimiento').show();
      $('#btnSeguimiento').hide();
      $('#Mensajes').hide();
      $('#Reagenda').hide();

    }
});
$('.detalles').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        'destroy': true,
        'processing' : true,
        'serverSide' : true,
    		'ajax' : '/detalles/table/'+rut+'/'+estado+'/'+epicrisis,
    		'columns' : [
          {data: 'id', name: 'id'},
          {data: 'psicologos.name', name: 'psicologos.name'},
          {data: 'fecha', name: 'fecha'},
          {data: 'hora', name: 'hora'},
          {data: 'estado', name: 'estado'},
          {data: 'acciones', name: 'acciones', orderable: false, searchable: false},

    		]
		});
    $('.detalles').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });

}


var Seguimiento = function()
{
  var id = document.getElementById("id").value;
  $('#id_agenda').val(id);
  $('#SeguimientoModal').modal({backdrop: 'static', keyboard: false, show: true}); 
}

$('#rutbuscar').Rut({
        on_error: function(){ 
          Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '¡Rut Incorrecto!'
          })
            $('#rutbuscar').val(''); 
            },
        format_on: 'keyup'
        });

$('#ResetarForm').on('click', function(e) {
    e.preventDefault();
    $('#Observacion').val('');
    $('#SeguimientoAdjunto').val('');
  }); 



  $('#Reservar').on('click', function(e) {
    e.preventDefault();
   $('#AgendarHoraModal').modal({backdrop: 'static', keyboard: false, show: true});
   $('#AgendarHora').hide();
   $('#mensajeAgendar').prop( "readonly", true );
   $('#comentariosAgenda').prop( "readonly", true );
  }); 



  var Reagendar = function(rutbuscar)
  {
    var ruta = "mensajes/"+rutbuscar;
    $.get(ruta, function(data){
      //console.log(data);
      $('#nombresAgendar').val(data.nombre).prop("disabled", false);
      $('#paternosAgendar').val(data.apellido_paterno).prop("disabled", false);
      $('#maternosAgendar').val(data.apellido_materno).prop("disabled", false);
      $('#jornadas').val(data.jornada).prop("disabled", false);
      $('#edadesAgendar').val(data.edad).prop("disabled", false);
      $('#telefonosAgendar').val(data.telefono).prop("disabled", false);
      $('#correosAgendar').val(data.email).prop("disabled", false);
      $('#sedesAgendar option[value="'+data.sede+'"]').prop("selected", true);
      document.getElementById("sedesAgendar").disabled = false;
      $('#tiposAgendar  option[value="'+data.tipo+'"]').prop("selected", true);
      document.getElementById("tiposAgendar").disabled = false;
      $('#atencionesAgendar  option[value="'+data.atencion+'"]').prop("selected", true);
      document.getElementById("atencionesAgendar").disabled = false;
      $('#jornadasAgendar').val(data.jornada).prop("selected", true);
      document.getElementById("jornadasAgendar").disabled = false;


      $('#fechaAgendar').prop("disabled", false);
      $('#horaAgendar').prop("disabled", false);
      $('#usuariosAgendar').prop("disabled", false);
      $('#mensajeAgendar').prop("readonly", false);
      $('#comentariosAgenda').prop("readonly", false);
      $('#AgendarHora').show();
    });
  }



  var NuevoAgendar = function(id)
  {
    $('#AgendarNuevaHoraModal').modal({backdrop: 'static', keyboard: false, show: true});
    var ruta = "mensajes/"+id+"/edit";
    $.get(ruta, function(data){
      //console.log(data);
      $('#nombresNuevo').val(data.nombre);
      $('#paternosNuevo').val(data.apellido_paterno);
      $('#maternosNuevo').val(data.apellido_materno);
      $('#rutNuevo').val(data.rut);
      $('#edadesNuevo').val(data.edad);
      $('#telefonosNuevo').val(data.telefono);
      $('#correosNuevo').val(data.email);
      $('#sedesNuevo option[value="'+data.sede+'"]').prop("selected", true);
      document.getElementById("sedesNuevo").readonly = false;
      $('#tiposNuevo  option[value="'+data.tipo+'"]').prop("selected", true);
      document.getElementById("tiposNuevo").readonly = false;
      $('#atencionesNuevo  option[value="'+data.atencion+'"]').prop("selected", true);
      document.getElementById("atencionesNuevo").readonly = false;
      $('#jornadasNuevo').val(data.jornada).prop("selected", true);
      document.getElementById("jornadasNuevo").removeAttribute("readonly");



      $('#fechaNuevo').prop("readonly", false);
      $('#horaNuevo').prop("disabled", false);
      $('#usuariosNuevo').prop("disabled", false);
      /*$('#mensajeAgendar').prop("readonly", false);
      $('#comentariosAgenda').prop("readonly", false);*/
      $('#AgendarHora').show();
      $('#DerivadoAgendar').show();
    });
  }



  $('#EditDatos').on('click', function(e) {
                e.preventDefault();

                var Fecha = $("#fecha").val();
                var Hora = $("#hora").val();
                var Mensaje = $("#mensaje").val();
                var id = $('#id').val();
                var url = "mensajes/"+id;



                if($('#usuarios').val()==0)
                {
                toastr.error('Ingrese un Psicólogo', 'Error!', {timeOut: 3000})
                return false;
                }

                if(Fecha == '')
                {
                toastr.error('Ingrese una Fecha', 'Error!', {timeOut: 3000})
                return false;
                }

                if(Hora == '')
                {
                toastr.error('Ingrese una Hora', 'Error!', {timeOut: 3000})
                return false;
                }

                if(Mensaje == '')
                {
                toastr.error('El Mensaje es Obligatorio', 'Error!', {timeOut: 3000})
                return false;
                }

                var form = $('#FormEditDatos');

                $.ajax({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: url,
                  type: 'PUT',
                  data: form.serialize(),
                  dataType: 'JSON',
                  beforeSend: function() {
                   $("#EditDatos").attr("disabled", true).html('Registrando... <i class="fa fa-refresh fa-spin"></i>');
                },
                  success: function(respuesta) {
                        if (respuesta.message == 'success') {
                          $("#FormEditDatos")[0].reset();
                          $('#Mensajes').hide();
                          $('#mensaje').val('');
                          Swal.fire({
                            title: "OK!",
                            text: "Mensaje Enviado Correctamente!",
                            icon: "success"
                          }).then((result) => {
                          if (result) {
                            $("#customCheck1").prop("checked", false);
                              location.reload();
                          }
                        });
                        }
                      }
                  });
            });





            $('#NuevoHora').on('click', function(e) {
                e.preventDefault();

                var Fecha = $("#fechaNuevo").val();
                var Hora = $("#horaNuevo").val();
                var Mensaje = $("#mensajeNuevo").val();



                if($('#usuariosNuevo').val()==0)
                {
                toastr.error('Ingrese un Psicólogo', 'Error!', {timeOut: 3000})
                return false;
                }

                if(Fecha == '')
                {
                toastr.error('Ingrese una Fecha', 'Error!', {timeOut: 3000})
                return false;
                }

                if(Hora == '')
                {
                toastr.error('Ingrese una Hora', 'Error!', {timeOut: 3000})
                return false;
                }

                if(Mensaje == '')
                {
                toastr.error('El Mensaje es Obligatorio', 'Error!', {timeOut: 3000})
                return false;
                }

                var form = $('#FormRNuevo');
                var url = form.attr('action');

                $.ajax({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: url,
                  type: 'POST',
                  data: form.serialize(),
                  dataType: 'JSON',
                  beforeSend: function() {
                   $("#NuevoHora").attr("disabled", true).html('Registrando... <i class="fa fa-refresh fa-spin"></i>');
                },
                  success: function(respuesta) {
                        if (respuesta.message == 'success') {
                          $("#FormRNuevo")[0].reset();
                          $('#Mensajes').hide();
                          $('#mensaje').val('');
                          $("#AgendarNuevaHoraModal").modal('hide');
                          Swal.fire({
                            title: "OK!",
                            text: "Hora Agendada Correctamente!",
                            icon: "success"
                          }).then((result) => {
                          if (result) {
                            $('.detalles').DataTable().ajax.reload();
                          }
                        });
                        }
                      }
                  });
            });


            $('#btnUpload').on('click', function(e) {
           e.preventDefault();

           var Observacion = $("#Observacion").val();
           var Adjunto = $("#SeguimientoAdjunto").val();

           if(Observacion === '')
           {
	           	toastr.error('Ingrese una Observación', 'Error!', {timeOut: 3000})
	            return false;
           }

           /*if(Adjunto === '')
           {
	           	toastr.error('Ingrese Al Menos un Archivo', 'Error!', {timeOut: 3000})
	            return false;
           }*/

           var form = $('#FormSeguimiento');
           var url = form.attr('action');
           var formData = new FormData($("#FormSeguimiento")[0]);

           $.ajax({
	          url: url,
	          type: 'POST',
	          data: formData,
	          cache:false,
	          contentType: false,
	          processData: false,
	          dataType: 'JSON',
	          success: function(respuesta) {
	             if (respuesta.message == 'success') {
                 if(respuesta.retorno == 3){
                  $('#btnSeguimiento').hide();
                 }
                $("#SeguimientoModal").modal('hide');
	                swal("OK!", "Seguimiento Correctamente!", "success")
	                .then((value) => {
	                  $('.detalles').DataTable().ajax.reload();
                    //Detalles(respuesta.retorno);
	                 $("#Observacion").val('');
                     $("#SeguimientoAdjunto").val('');
                     $('input[type=checkbox]').prop('checked',false);
	                });
              }
	         }
	    }); 

    	});

var ActualizaTabla = function()
{
	location.reload();
}

var VaciarForm = function()
 {
 $('#Observacion').val('');
    $('#SeguimientoAdjunto').val('');
 }


 $('#customCheck1').on('change', function() {
             if ($(this).is(':checked') ) {
              $('#EditDatos').show();
              document.getElementById("usuarios").disabled = false;
              $('#fecha').prop( "readonly", false );
              $('#hora').prop( "readonly", false );
              $('#Mensajes').show();
              $('#mensaje').val('');
                
             } else {
              $('#EditDatos').hide();
              document.getElementById("usuarios").disabled = true;
              $('#fecha').prop( "readonly", true  );
              $('#hora').prop( "readonly", true );
              $('#Mensajes').hide();
              $('#mensaje').val('');
                
            }
        });


var Finalizar = function(id)
{
  swal.fire({
  title: "Esta Seguro?",
  text: "Una vez finalizado, no podrá recuperar este usuario!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'Si, Finalizar!'
})
.then((willDelete) => {
  if (willDelete.value) {
  	$.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
  		  url: "finalizar/"+id,
        type: 'GET',
        dataType: 'JSON',
        success: function(respuesta) {
          if (respuesta.message == 'success') {
            Swal.fire({
                title: "OK!",
                text: "Sesión Finalizada Correctamente!",
                icon: "success"
              }).then((result) => {
              if(result) {
                $('.detalles').DataTable().ajax.reload();
                location.reload();
              }
            });
           }
       },
          error: function (respuesta) {
            swal("Error!", "Error de conexion, intentelo más tarde.", "error");
          }

  	});
    } else {
  }
});
}


var Epicrisis = function(id)
{
  swal.fire({
  title: "Esta Seguro?",
  text: "Finalizará la sesión con epicrisis",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'Si, Finalizar!'
})
.then((willDelete) => {
  if (willDelete.value) {
  	$.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
  		  url: "epicrisis/"+id,
        type: 'GET',
        dataType: 'JSON',
        success: function(respuesta) {
          if (respuesta.message == 'success') {
            Swal.fire({
                title: "OK!",
                text: "Sesión con Epicrisis Finalizada Correctamente!",
                icon: "success"
              }).then((result) => {
              if(result) {
                $('.detalles').DataTable().ajax.reload();
                location.reload();
              }
            });
           }
       },
          error: function (respuesta) {
            swal("Error!", "Error de conexion, intentelo más tarde.", "error");
          }

  	});
    } else {
  }
});
}
</script>
@endsection