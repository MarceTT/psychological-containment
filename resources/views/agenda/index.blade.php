@extends('layout.admin')
@section('content')
<div class="card border-primary mb-3">
    <div class="card-header">
        Ingresar Horario
      </div>
      <div class="card-body">
        <div id='calendar'></div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AgendaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agendar una Hora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Agendar</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
{!! Html::script('https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.js') !!}
{!! Html::script('https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.1.0/main.min.js,npm/fullcalendar@5.1.0/locales-all.min.js') !!}
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        navLinks: true, 
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          $('#AgendaModal').modal({backdrop: 'static', keyboard: false, show: true});
          calendar.unselect()
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
          {
            title: 'All Day Event',
            start: '2020-06-01'
          },
          {
            title: 'Long Event',
            start: '2020-06-07',
            end: '2020-06-10'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2020-06-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2020-06-16T16:00:00'
          },
          {
            title: 'Conference',
            start: '2020-06-11',
            end: '2020-06-13'
          },
          {
            title: 'Meeting',
            start: '2020-06-12T10:30:00',
            end: '2020-06-12T12:30:00'
          },
          {
            title: 'Lunch',
            start: '2020-06-12T12:00:00'
          },
          {
            title: 'Meeting',
            start: '2020-06-12T14:30:00'
          },
          {
            title: 'Happy Hour',
            start: '2020-06-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2020-06-12T20:00:00'
          },
          {
            title: 'Birthday Party',
            start: '2020-06-13T07:00:00'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2020-06-28'
          }
        ]
      });
  
      calendar.render();
    });
  
  </script>
@endsection