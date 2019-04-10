<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' =>'form-control'] ) !!}
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('cp', 'CP') !!}
        {!! Form::text('cp', null, ['class' =>'form-control', 'minlength' =>'4', 'maxlengh' => '4'] ) !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('zona_id', 'Zona') !!}
        {!! Form::select('zona_id', $zonas, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_zonas', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('dpto_id', 'Departamento') !!}
        {!! Form::select('dpto_id', $dptos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_dptos', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('provincia_id', 'Provincia') !!}
        {!! Form::select('provincia_id', $provincias, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_provincias', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>
</div>

<br /><br />
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::submit('GUARDAR', ['class' => 'btn btn-success']) !!}
    </div>
</div>
