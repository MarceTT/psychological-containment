<div class="table-responsive">
    <table class="table agendada" id="ListadoCan">
      <thead class="thead-light">
        <tr>
            <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre</th>
            <th scope="col" style="background-color: #041E42; color: #00BFB2;">Apellido</th>
            <th scope="col" style="background-color: #041E42; color: #00BFB2;">Email</th>
            <th scope="col" style="background-color: #041E42; color: #00BFB2;">Fecha Agenda</th>
            <th scope="col" style="background-color: #041E42; color: #00BFB2;">Hora</th>
            <th scope="col" style="background-color: #041E42; color: #00BFB2;">Psicólogo</th>
            <th scope="col" style="background-color: #041E42; color: #00BFB2;">Estado</th>
            <th scope="col" style="background-color: #041E42; color: #00BFB2;">Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach($atendidas as $atendida)
        <tr>
          <td>{{ $atendida->nombre }}</td>
          <td>{{ $atendida->apellido_paterno }}</td>
          <td>{{ $atendida->email }}</td>
          <td>{{ $atendida->fecha }}</td>
          <td>{{ $atendida->hora }}</td>
          <td>{{ $atendida->psicologos->name }}</td>
          <td>@if($atendida->epicrisis == 1)<span class="badge badge-danger">FINALIZADA CON EPICRISIS</span>@else<span class="badge badge-info">ATENDIDA</span>@endif</td>
          <td>
            <button type="button" onclick="Detalles('{{ $atendida->id }}','{{ $atendida->rut }}','{{ $atendida->estado }}','{{ $atendida->epicrisis }}')" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Detalle"><i class="fa fa-calendar"></i> </button>
              
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>