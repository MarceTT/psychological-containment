<!-- Modal -->
<div class="modal fade" id="DetallesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content" style="border-color: #E0004D;">
        <div class="modal-header" style="background-color: #041E42">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Detalles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="ActualizaTabla();">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card mb-3" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #041E42; color: #fff;">
                </div>
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label class="pull-left">Nombre </label>
                      <input type="text" class="form-control mr-10" id="nombres" name="nombre" onkeyup= "mayus(this);" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="pull-left">Apellido Paterno</label>
                        <input type="text" class="form-control "id="paternos" name="paterno" onkeyup= "mayus(this);" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="pull-left">Apellido Materno</label>
                        <input type="text" class="form-control "id="maternos" name="materno" onkeyup= "mayus(this);" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="pull-left">Rut</label>
                      <input type="text" class="form-control "id="rut2" name="rut" required>
                  </div>
                    
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="pull-left">Edad </label>
                    <input type="text" class="form-control" id="edades" name="edad" maxlength="2" onKeyPress="return soloNumeros(event)" required>
                </div>
                  <div class="form-group col-md-6">
                      <label class="pull-left">Teléfono </label>
                    <input type="email" class="form-control " id="telefonos" name="telefono"  onKeyPress="return soloNumeros(event)"  required>
                  </div>
              </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="pull-left">Dirección de e-mail </label>
                      <input type="email" class="form-control " id="correos" name="correo" onkeyup= "mayus(this);"  required>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="pull-left">Sede </label>
                      <select class="form-control" name="sede" id="sedes"  disabled>
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
                    <select class="form-control" name="atencion" id="atenciones" disabled>
                        <option value="0">--Seleccione Atención--</option>
                        <option value="Zoom">Zoom</option>
                        <option value="Meet">Meet</option>
                        <option value="Telefónica">Telefónica</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="pull-left">Tipo </label>
                  <select class="form-control" name="tipo" id="tipos" disabled>
                      <option value="0">--Seleccione Tipo--</option>
                      <option value="Docente">Docente</option>
                      <option value="Estudiante">Estudiante</option>
                      <option value="Funcionario">Funcionario</option>
                  </select>
              </div>
              </div>
              {!! Form::open(['id' => 'FormEditDatos', 'method' => 'PUT']) !!}
              {!! Form::hidden('id', false , ['id' => 'id']) !!}
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label class="pull-left">Jornada</label>
                      <input type="text" class="form-control " id="jornadas" name="jornada"  onkeyup= "mayus(this);" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="pull-left">Motivo de consulta </label>
                        {{ Form::textarea('comentario', null , ['class' => 'form-control','id' => 'comentarios', 'size' => '3x3', 'onkeyup' => "mayus(this);"]) }}
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label class="pull-left">Fecha<small style="color:red;"> *</small></label>
                    <input type="text" class="form-control " id="fecha" name="fecha"  onkeyup= "mayus(this);" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="pull-left">Hora <small style="color:red;"> *</small></label>
                    <input type="time" class="form-control" min="08:00" max="23:00" id="hora" name="hora"  onkeyup= "mayus(this);" required>
                </div>
                <div class="form-group col-md-4">
                  <label class="pull-left">Psicólogo <small style="color:red;"> *</small></label>
                  <select class="form-control" name="usuario" id="usuarios">
                      <option value="0">--Seleccione Psicólogo--</option>
                      @foreach($usuarios as $usuario)
                      <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group col-md-12" id="Mensajes">
                <label class="pull-left">Mensaje </label>
                {{ Form::textarea('mensaje', null , ['class' => 'form-control','id' => 'mensaje', 'size' => '3x3', 'onkeyup' => "mayus(this);"]) }}
            </div>
              </div>
              {!! Form::close() !!}
              <div class="form-group" id="Reagenda">
                <div class="custom-control custom-checkbox mb-10">
                    <input type="checkbox" class="custom-control-input" name="necesitaexamen" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Necesita Reagendar Hora?</label>
                </div>
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" id="EditDatos">Agendar Hora</button>
                </div>
               
                </div>
                
              </div>
              <div class="card mb-3" style="border-color: #E0004D;" id="Seguimiento">
                <div class="card-header" style="background-color: #041E42; color: #fff;">Sesiones <!--<button type="button" onclick="Seguimiento()" class="btn btn-outline-danger btn-sm float-right" id="btnSeguimiento"><i class="fa fa-cogs"></i> Agregar Seguimiento</button>--></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-4 table-sm detalles" style="width:100%">
                      <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Psicólogo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
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
  