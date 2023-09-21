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
          @foreach($agendadas as $agendada)
        <tr>
          <td>{{ $agendada->nombre }}</td>
          <td>{{ $agendada->apellido_paterno }}</td>
          <td>{{ $agendada->email }}</td>
          <td>{{ $agendada->fecha }}</td>
          <td>{{ $agendada->hora }}</td>
          <td>{{ $agendada->psicologos->name }}</td>
          <td><span class="badge badge-primary">AGENDADA</span></td>
          <td>
            <button type="button" onclick="Detalles('{{ $agendada->id }}','{{ $agendada->rut }}','{{ $agendada->estado }}','{{ $agendada->epicrisis }}');" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Hora"><i class="fa fa-calendar"></i> </button>
              
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>