<!-- Modal -->
<div class="modal fade" id="AgendarHoraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content" style="border-color: #E0004D;">
      <div class="modal-header" style="background-color: #041E42">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: #fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card mb-3" style="border-color: #E0004D;">
              <div class="card-header" style="background-color: #041E42; color: #fff;">
              </div>
              <div class="card-body">
                {!! Form::open(['route' => 'reagendar.guardar','id' => 'FormReagendar', 'method' => 'POST']) !!}
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="pull-left">Nombre </label>
                    <input type="text" class="form-control mr-10" id="nombresAgendar" name="nombre" onkeyup= "mayus(this);" disabled>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="pull-left">Apellido Paterno</label>
                      <input type="text" class="form-control "id="paternosAgendar" name="paterno" onkeyup= "mayus(this);" disabled>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="pull-left">Apellido Materno</label>
                      <input type="text" class="form-control "id="maternosAgendar" name="materno" onkeyup= "mayus(this);" disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="pull-left">Rut</label>
                    <input type="text" class="form-control "id="rutbuscar" name="rut" onchange="Reagendar(rutbuscar.value);">
                </div>
                  
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="pull-left">Edad </label>
                  <input type="text" class="form-control" id="edadesAgendar" name="edad" maxlength="2" onKeyPress="return soloNumeros(event)" disabled>
              </div>
                <div class="form-group col-md-6">
                    <label class="pull-left">Teléfono </label>
                  <input type="email" class="form-control " id="telefonosAgendar" name="telefono"  onKeyPress="return soloNumeros(event)"  disabled>
                </div>
            </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="pull-left">Dirección de e-mail </label>
                    <input type="email" class="form-control " id="correosAgendar" name="correo" onkeyup= "mayus(this);"  disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="pull-left">Sede </label>
                    <select class="form-control" name="sede" id="sedesAgendar"  disabled>
                        <option value="0">--Seleccione Sede--</option>
                        <option value="Antofagasta">Antofagasta</option>
                        <option value="La Serena">La Serena</option>
                        <option value="Santiago">Santiago</option>
                        <option value="Chillan">Chillan</option>
                    </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="pull-left">Atención </label>
                  <select class="form-control" name="atencion" id="atencionesAgendar" disabled>
                      <option value="0">--Seleccione Atención--</option>
                      <option value="Zoom">Zoom</option>
                      <option value="Meet">Meet</option>
                      <option value="Telefónica">Telefónica</option>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label class="pull-left">Tipo </label>
                <select class="form-control" name="tipo" id="tiposAgendar" disabled>
                    <option value="0">--Seleccione Tipo--</option>
                    <option value="Docente">Docente</option>
                    <option value="Estudiante">Estudiante</option>
                    <option value="Funcionario">Funcionario</option>
                </select>
            </div>
            </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="pull-left">Jornada</label>
                    <input type="text" class="form-control " id="jornadasAgendar" name="jornada"  onkeyup= "mayus(this);" disabled>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="pull-left">Motivo de consulta </label>
                      {{ Form::textarea('comentario', null , ['class' => 'form-control','id' => 'comentariosAgenda', 'size' => '3x3', 'onkeyup' => "mayus(this);"]) }}
                  </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label class="pull-left">Fecha<small style="color:red;"> *</small></label>
                  <input type="text" class="form-control " id="fechaAgendar" name="fecha"  onkeyup= "mayus(this);" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label class="pull-left">Hora <small style="color:red;"> *</small></label>
                  <input type="time" class="form-control" min="08:00" max="18:00" id="horaAgendar" name="hora"  onkeyup= "mayus(this);" disabled>
              </div>
              <div class="form-group col-md-4">
                <label class="pull-left">Psicologo <small style="color:red;"> *</small></label>
                <select class="form-control" name="usuario" id="usuariosAgendar" disabled>
                    <option value="0">--Seleccione Psicologo--</option>
                    @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12" id="MensajesAgenda">
              <label class="pull-left">Mensaje </label>
              {{ Form::textarea('mensaje', null , ['class' => 'form-control','id' => 'mensajeAgendar', 'size' => '3x3', 'onkeyup' => "mayus(this);"]) }}
          </div>
            </div>
            {!! Form::close() !!}
              <div class="modal-footer">
                <button type="button" class="btn btn-success" id="AgendarHora">Agendar Hora</button>
              </div>
             
              </div>
              
            </div>
            <div class="card mb-3" style="border-color: #E0004D;" id="Seguimiento">
              <div class="card-header" style="background-color: #041E42; color: #fff;">Horas Anteriores </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped mb-4 table-sm detalles">
                    <thead class="thead-dark">
                          <tr>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apellido</th>
                              <th scope="col">Fecha Atención</th>
                              <th scope="col">Hora</th>
                              <th scope="col">Psicólogo</th>
                              <th scope="col">Detalles</th>
                            </tr>
                      </thead>
                  </table>
              </div>
              </div>
            </div>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="ActualizaTabla();">Cerrar</button>
      </div>
    </div>
  </div>
</div>
