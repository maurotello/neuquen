{{ Form::open(['route' => 'desembolso.store', 'id'=>'AgregarDesembolso']) }}
<div class="modal fade" id="addDesembolso">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Nuevo Desembolso</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" id="proyecto_id" name="proyecto_id">

                        <div class="form-group col-sm-3">
                            {!! Form::label('fecha', 'Fecha') !!}
                            {!! Form::text('fecha', null, ['class' =>'form-control', 'id'=>'fecha_nuevo_desembolso'] ) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            {!! Form::label('nro', 'Nro') !!}
                            {!! Form::text('nro', null, ['class' =>'form-control', 'id'=>'nro_nuevo_desembolso'] ) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            {!! Form::label('monto', 'Monto') !!}
                            {!! Form::text('monto', null, ['class' =>'form-control', 'id'=>'monto_nuevo_desembolso'] ) !!}
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion', null, ['class' =>'form-control'] ) !!}
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input id="guardar_add_desembolso" type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
