{{ Form::open(['route' => 'movimiento.store', 'id'=>'agregar_movimiento']) }}
<div class="modal fade" id="addMovimiento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Nuevo Movimiento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" id="proyecto_id" name="proyecto_id">

                        <div class="form-group col-sm-3">
                            {!! Form::label('fecha', 'Fecha') !!}
                            {!! Form::text('fecha', null, ['class' =>'form-control', 'id'=>'fecha_nuevo_movimiento'] ) !!}
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion', null, ['class' =>'form-control'] ) !!}
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input id="guardar_add_movimiento" type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
