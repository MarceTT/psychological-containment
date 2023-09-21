@extends('layout.admin')
@section('content')
<div id='calendar'></div>
@include('calendario.detalle')
@endsection
@section('scripts')
{!! Html::script('js/main.js') !!}
{!! Html::script('https://unpkg.com/fullcalendar@5.1.0/locales-all.js') !!}
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap',
        locale: 'es',
        timeZone: 'America/Santiago',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      eventClick: function(arg) {
        //console.log(arg.event.extendedProps.psicologo);
        $('#DetalleEventoModal').modal({backdrop: 'static', keyboard: false, show: true});
        $('#Paciente').html(arg.event.extendedProps.paciente);
        $('#Sicologo').html(arg.event.extendedProps.psicologo);
        $('#Fecha').html(arg.event.extendedProps.fecha);
        $('#Hora').html(arg.event.extendedProps.hora);
        $('#Estado').html(arg.event.extendedProps.estado);
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: '/listar'
    });

    calendar.render();
  });
</script>
@endsection 