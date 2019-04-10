<div class="modal fade" id="editDesembolso1" tabindex="-1" role="dialog" aria-labelledby="labelModal">
    <div class="modal-dialog" role="document">

        <form id="actualizarDesembolso" action="{{route('desembolso.updateAjax','1')}}" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="labelModal">Editar Desembolso</h4>
                </div>
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="idAjax" name="idAjax">
                        <div class="form-group col-sm-3">
                            <label  class="control-label" for="fecha">Fecha</label>
                            <input type="text" class="form-control" name="fechaAjax" id="fechaAjax" />
                        </div>
                        <div class="form-group col-sm-3">
                            <label  class="control-label" for="nro">Nro</label>
                            <input type="text" class="form-control" name="nroAjax" id="nroAjax" />
                        </div>
                        <div class="form-group col-sm-3">
                            <label  class="control-label" for="monto">Monto</label>
                            <input type="text" class="form-control" name="montoAjax" id="montoAjax" />
                        </div>
                        <div class="form-group col-sm-12">
                            <label  class="control-label" for="descripcion">Descripcion</label>
                            <textarea  class="form-control" name="descripcionAjax" id="descripcionAjax"> </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <input id="button_guardar_desembolso" type="button" class="btn btn-primary" value="Guardar" onclick="submitDesembolso()">
                </div>
            </div>

        </form>

    </div>
</div>
