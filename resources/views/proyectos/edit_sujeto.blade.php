<div class="modal fade" id="editSujeto" tabindex="-1" role="dialog" aria-labelledby="labelModal">
    <div class="modal-dialog" role="document">
        <form id="actualizarSujetoCredito" action="{{route('sujetoCredito.updateAjax','1')}}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="labelModal">Editar Sujeto de Crédito</h4>
                </div>
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="idSujetoAjax" name="idSujetoAjax">
                        <div class="form-group col-sm-3">
                            <label  class="control-label" for="fecha">Sucursal</label>
                            <input type="text" class="form-control" name="SucursalSujetoAjax" id="SucursalSujetoAjax" />
                        </div>
                        <div class="form-group col-sm-3">
                            <label  class="control-label" for="nro">Envío Banco</label>
                            <input type="text" class="form-control" name="fechaEnvioSujetoAjax" id="fechaEnvioSujetoAjax" />
                        </div>
                        <div class="form-group col-sm-3">
                            <label  class="control-label" for="monto">Respuesta Banco</label>
                            <input type="text" class="form-control" name="fechaRespuestaSujetoAjax" id="fechaRespuestaSujetoAjax" />
                        </div>
                        <div class="form-group col-sm-3">
                            <label  class="control-label" for="monto">Es Sujeto?</label>
                              <select class="form-control" name="sujetoCreditoAjax" id="sujetoCreditoAjax">
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                              </select>
                           <!-- <input type="text" class="form-control" name="sujetoCreditoAjax" id="sujetoCreditoAjax" /> -->
                        </div>
                        <div class="form-group col-sm-12">
                            <label  class="control-label" for="descripcion">Descripcion</label>
                            <textarea  class="form-control" name="descripcion1Ajax" id="descripcion1Ajax"> </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="boton_guardar_sujeto" type="button" class="btn btn-primary" value="Guardar" onclick="submitSujeto()">
                </div>
            </div>
        </form>
    </div>
</div>
