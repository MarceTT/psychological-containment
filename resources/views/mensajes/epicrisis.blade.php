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
          @foreach($epicrisis as $epicrisi)
        <tr>
          <td>{{ $epicrisi->nombre }}</td>
          <td>{{ $epicrisi->apellido_paterno }}</td>
          <td>{{ $epicrisi->email }}</td>
          <td>{{ $epicrisi->fecha }}</td>
          <td>{{ $epicrisi->hora }}</td>
          <td>{{ $epicrisi->psicologos->name }}</td>
          <td>@if($epicrisi->epicrisis == 1)<span class="badge badge-danger">FINALIZADA CON EPICRISIS</span>@endif</td>
          <td>
            <button type="button" onclick="Detalles('{{ $epicrisi->id }}','{{ $epicrisi->rut }}','{{ $epicrisi->estado }}','{{ $epicrisi->epicrisis }}')" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Detalles"><i class="fa fa-calendar"></i> </button>
              
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>