{{ Form::open(['route' => 'sujetoCredito.store', 'id'=>'agregar_sujeto']) }}
<div class="modal fade" id="addSujeto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Nuevo Sujeto de Crédito</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" id="proyecto_id" name="proyecto_id">
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('fecha_envio_banco', 'Fecha Envío al Banco') !!}
                        {!! Form::text('fecha_envio_banco', null, ['class' =>'form-control', 'id'=>'fecha_envio_banco_nuevo_sujeto'] ) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('fecha_respuesta_banco', 'Fecha Envío al Banco') !!}
                        {!! Form::text('fecha_respuesta_banco', null, ['class' =>'form-control' , 'id'=>'fecha_respuesta_banco_nuevo_sujeto'] ) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('sujeto_credito', 'Sujeto? SI/NO') !!}
                        {!! Form::select('sujeto_credito', [''=>'Seleccione', 'SI'=>'SI', 'NO'=>'NO'], null, ['class' => 'form-control',  'id' => 'select_sujeto_nuevo_sujeto', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('sucursal_id', 'Sucursal Banco') !!}
                        {!! Form::select('sucursal_id', $sucursales, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_sucursal_nuevo_sujeto', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-11">
                        {!! Form::label('descripcion', 'Decripción') !!}
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'id'=>'descripcion_nuevo_sujeto', 'rows' => 3, 'data-toggle'=>'tooltip', 'data-placement'=>'bottom']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input id="guardar_add_sujeto" type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
