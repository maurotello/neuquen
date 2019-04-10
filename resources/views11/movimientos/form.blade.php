<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('fecha', 'Fecha') !!}
        {!! Form::text('fecha', null, ['class' =>'form-control'] ) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('proyecto_id', 'Proyecto') !!}
        {!! Form::select('proyecto_id', $proyectos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_proyectos', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-9">
        {!! Form::label('descripcion', 'Descripcion') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
</div>
<br /><hr><br />
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::submit('GUARDAR', ['class' => 'btn btn-success']) !!}
    </div>
</div>
