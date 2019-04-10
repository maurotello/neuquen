<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('fecha_envio_banco', 'Fecha Envío al Banco') !!}
        {!! Form::text('fecha_envio_banco', null, ['class' =>'form-control'] ) !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('fecha_respuesta_banco', 'Fecha Envío al Banco') !!}
        {!! Form::text('fecha_respuesta_banco', null, ['class' =>'form-control'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label('proyecto_id', 'Proyecto') !!}
        {!! Form::select('proyecto_id', $proyectos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_zonas', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
    <div class="form-group col-sm-5">
        {!! Form::label('sucursal_id', 'Sucursal Banco') !!}
        {!! Form::select('sucursal_id', $sucursales, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_provincias', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-11">
        {!! Form::label('descripcion', 'Decripción') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 3, 'data-toggle'=>'tooltip', 'data-placement'=>'bottom']) !!}
    </div>
</div>
