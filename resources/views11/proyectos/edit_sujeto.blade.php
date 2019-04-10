{{ Form::open(['route' => 'sujetoCredito.updateAjax', 'id'=>'actualizarSujetoCredito']) }}
<div class="modal fade" id="editSujeto" tabindex="-1" role="dialog" aria-labelledby="labelModal">
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
                        <input type="hidden" class="form-control" id="idSujetoAjax" name="idSujetoAjax">

                        
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('fecha_envio_banco', 'Fecha Envío al Banco') !!}
                        {!! Form::text('fecha_envio_banco', null, ['class' =>'form-control', 'id'=>'fechaEnvioSujetoAjax'] ) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('fecha_respuesta_banco', 'Fecha Envío al Banco') !!}
                        {!! Form::text('fecha_respuesta_banco', null, ['class' =>'form-control' , 'id'=>'fechaRespuestaSujetoAjax'] ) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('sujeto_credito', 'Sujeto? SI/NO') !!}
                        {!! Form::select('sujeto_credito', [''=>'Seleccione', 'SI'=>'SI', 'NO'=>'NO'], null, ['class' => 'form-control',  'id' => 'sujetoCreditoAjax', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('sucursal_id', 'Sucursal Banco') !!}
                        {!! Form::select('sucursal_id', $sucursales, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'sucursal_id', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-11">
                        {!! Form::label('descripcion', 'Decripción') !!}
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'id'=>'descripcion1Ajax', 'rows' => 3, 'data-toggle'=>'tooltip', 'data-placement'=>'bottom']) !!}
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
