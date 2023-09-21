<!-- Modal -->
<div class="modal fade" id="AgendarNuevaHoraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="z-index: 100000;">
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
                  {!! Form::open(['route' => 'reagendar.guardar','id' => 'FormRNuevo', 'method' => 'POST']) !!}
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label class="pull-left">Nombre </label>
                      <input type="text" class="form-control mr-10" id="nombresNuevo" name="nombre" onkeyup= "mayus(this);" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="pull-left">Apellido Paterno</label>
                        <input type="text" class="form-control "id="paternosNuevo" name="paterno" onkeyup= "mayus(this);" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="pull-left">Apellido Materno</label>
                        <input type="text" class="form-control "id="maternosNuevo" name="materno" onkeyup= "mayus(this);" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="pull-left">Rut</label>
                      <input type="text" class="form-control "id="rutNuevo" name="rut" readonly>
                  </div>
                    
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="pull-left">Edad </label>
                    <input type="text" class="form-control" id="edadesNuevo" name="edad" maxlength="2" onKeyPress="return soloNumeros(event)" readonly>
                </div>
                  <div class="form-group col-md-6">
                      <label class="pull-left">Teléfono </label>
                    <input type="email" class="form-control " id="telefonosNuevo" name="telefono"  onKeyPress="return soloNumeros(event)"  readonly>
                  </div>
              </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="pull-left">Dirección de e-mail </label>
                      <input type="email" class="form-control " id="correosNuevo" name="correo" onkeyup= "mayus(this);"  readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="pull-left">Sede </label>
                      <select class="form-control" name="sede" id="sedesNuevo" readonly>
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
                    <select class="form-control" name="atencion" id="atencionesNuevo" readonly>
                        <option value="0">--Seleccione Atención--</option>
                        <option value="Zoom">Zoom</option>
                        <option value="Meet">Meet</option>
                        <option value="Telefónica">Telefónica</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="pull-left">Tipo </label>
                  <select class="form-control" name="tipo" id="tiposNuevo" readonly>
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
                      <select class="form-control" name="jornada" id="jornadasNuevo" readonly>
                        <option value="0">--Seleccione Jornada--</option>
                        <option value="Diurna">Diurna (9:30 a 14:00)</option>
                        <option value="Vespertina">Vespertina (18:30 a 22:00)</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="pull-left">Motivo de consulta </label>
                        {{ Form::textarea('comentario', null , ['class' => 'form-control','id' => 'comentariosNuevo', 'size' => '3x3', 'onkeyup' => "mayus(this);"]) }}
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label class="pull-left">Fecha<small style="color:red;"> *</small></label>
                    <input type="date" class="form-control " id="fechaNuevo" name="fecha"  onkeyup= "mayus(this);" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="pull-left">Hora <small style="color:red;"> *</small></label>
                    <input type="time" class="form-control" min="09:00" max="23:00" id="horaNuevo" name="hora"  onkeyup= "mayus(this);" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label class="pull-left">Psicologo <small style="color:red;"> *</small></label>
                  <select class="form-control" name="usuario" id="usuariosNuevo" disabled>
                      <option value="0">--Seleccione Psicologo--</option>
                      @foreach($usuarios as $usuario)
                      <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group col-md-12" id="MensajesNuevo">
                <label class="pull-left">Mensaje </label>
                {{ Form::textarea('mensaje', null , ['class' => 'form-control','id' => 'mensajeNuevo', 'size' => '3x3', 'onkeyup' => "mayus(this);"]) }}
            </div>
              </div>
              <div class="form-group" id="DerivadoAgendar">
                <div class="form-check form-check-inline">
                  {!! Form::checkbox('derivado', '1', null, ['class' => 'form-check-input', 'id' => 'derivado']) !!}
                  <label class="form-check-label" for="Derivados">Derivado</label>
                </div>
            </div>
              {!! Form::close() !!}
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" id="NuevoHora">Agendar Hora</button>
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
  