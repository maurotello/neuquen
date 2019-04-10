<div class="row">
      <div class="form-group col-sm-2">
            {!! Form::label('fechaIngreso', 'Fecha Ingreso') !!}
            {!! Form::text('fechaIngreso', null, ['class' =>'form-control', 'required', 'minlength' =>'10'] ) !!}
      </div>
      <div class="form-group col-sm-6">
            {!! Form::label('nombre', 'Nombre Proyecto') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
      </div>
      <div class="form-group col-sm-3">
            {!! Form::label('localidad_id', 'Localidad') !!}
            {!! Form::select('localidad_id', $localidades, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
             'id' => 'select_localidades', 'required']) !!}
      </div>
</div>
<div class="row">
      <div class="form-group col-sm-4">
            {!! Form::label('lineaCredito_id', 'Línea de Crédito') !!}
            {!! Form::select('lineaCredito_id', $lineasCreditos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
             'id' => 'select_linea_credito', 'required']) !!}
      </div>
      <div class="form-group col-sm-3">
            {!! Form::label('estado_id', 'Estado') !!}
            {!! Form::select('estado_id', $estados, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
             'id' => 'select_estado', 'required']) !!}
      </div>
      <div class="form-group col-sm-4">
            {!! Form::label('estadoInterno_id', 'Estado Interno') !!}
            {!! Form::select('estadoInterno_id', $estadosInternos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
             'id' => 'select_estado_interno', 'required']) !!}
      </div>
</div>
<div class="row">
      <div class="form-group col-sm-3">
            {!! Form::label('sector_id', 'Sector') !!}
            {!! Form::select('sector_id', $sectores, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
             'id' => 'select_sector', 'required']) !!}
      </div>
      <div class="form-group col-sm-5">
            {!! Form::label('titular', 'Titular') !!}
            {!! Form::text('titular', null, ['class' => 'form-control','required']) !!}
      </div>
      <div class="form-group col-sm-3">
            {!! Form::label('monto', 'Monto') !!}
            {!! Form::text('monto', null, ['onchange'=>"updateMonto(value)",'class' => 'form-control','required']) !!}
      </div>

</div>
