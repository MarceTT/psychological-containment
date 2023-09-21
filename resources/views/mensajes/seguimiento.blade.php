<!-- Modal -->
<div class="modal hide fade" id="SeguimientoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="z-index: 100000;">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content" style="border-color: #E0004D;">
        <div class="modal-header" style="background-color: #041E42">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Ingresar Seguimiento</h5>
          <button type="button" class="close" data-dismiss="modal"  aria-label="Close" id="ResetarForm">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card border-primary mb-3">
                <div class="card-header"></div>
                  <div class="card-body">
                    {!! Form::open([ 'route' => [ 'seguimiento.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'id' => 'FormSeguimiento' ]) !!}
                    {!! Form::hidden('id_agenda', false , ['id' => 'id_agenda']) !!}
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Observación</label>
                        <textarea class="form-control" name="observacion" id="Observacion" rows="3" onkeyup = "mayus(this);"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Adjuntos</label>
                        {!! Form::file('SeguimientoAdjunto[]', ['class' => 'form-control-file','id' => 'SeguimientoAdjunto', 'multiple' => 'multiple']) !!}
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" name="estado" id="estado">
                        <label class="form-check-label" for="defaultCheck1">
                          Desea Finalizar Epicrisis?
                        </label>
                      </div>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onClick="VaciarForm();" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-success" id="btnUpload">Agregar Seguimiento</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>