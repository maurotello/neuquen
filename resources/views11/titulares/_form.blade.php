
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('proyecto_id', 'Proyecto') !!}
        {!! Form::select('proyecto_id', $proyectos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_proyectos', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('apeynom', 'Apellido y Nombre') !!}
        {!! Form::text('apeynom', null, ['id'=>'apeynom', 'class' => 'form-control', 'required'])
        !!}
    </div>
</div>



<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
        {!! Form::text('fecha_nacimiento', null, ['id'=>'fecha_nacimiento_titular', 'class' => 'form-control'])
        !!}
    </div>
        <div class="form-group col-sm-3">
        {!! Form::label('dni', 'Nº DNI') !!}
        {!! Form::text('dni', null, ['class' => 'form-control'])
        !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('cuit', 'CUIT') !!}
        {!! Form::text('cuit', null, ['class' => 'form-control'])
        !!}
    </div>
    
</div>

<div class="row">

    <div class="form-group col-sm-3">
        {!! Form::label('telefono', 'Teléfono') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control'])
        !!}
    </div>
    <div class="form-group col-sm-8">
        {!! Form::label('domicilioLegal', 'Domicilio') !!}
        {!! Form::text('domicilioLegal', null, ['class' => 'form-control'])
        !!}
    </div>
</div>

<div class="row">
  <div class="form-group col-sm-5">
        {!! Form::label('estado_civil_id', 'Estado Civil') !!}
        {!! Form::select('estado_civil_id', $estadosCiviles, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_estado_civil', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
  </div>
  <div class="form-group col-sm-6">
        {!! Form::label('localidad_id', 'Localidad') !!}
        {!! Form::select('localidad_id', $localidades, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_localidad', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
   </div>
</div>

<div class="row">
   <div class="form-group col-sm-8">
        {!! Form::label('apeynom_conyuge', 'Apellido y Nombre Conyuge') !!}
        {!! Form::text('apeynom_conyuge', null, ['class' => 'form-control'])
        !!}
    </div>
   <div class="form-group col-sm-3">
        {!! Form::label('dni_conyuge', 'DNI Conyuge') !!}
        {!! Form::text('dni_conyuge', null, ['class' => 'form-control'])
        !!}
    </div>
    
</div>

<div class="row">
   <div class="form-group col-sm-5">
        {!! Form::label('telefono_conyuge', 'Tel{efono Cónyuge') !!}
        {!! Form::text('telefono_conyuge', null, ['class' => 'form-control'])
        !!}
    </div>
   <div class="form-group col-sm-3">
        {!! Form::label('fecha_nacimiento_conyuge', 'Fecha Nac.  Conyuge') !!}
        {!! Form::text('fecha_nacimiento_conyuge', null, ['id'=>'fecha_nacimiento_conyuge','class' => 'form-control'])
        !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('cuit_conyuge', 'CUIT Conyuge') !!}
        {!! Form::text('cuit_conyuge', null, ['class' => 'form-control'])
        !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-11">
        {!! Form::label('descripcion', 'Decripción') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 3, 'data-toggle'=>'tooltip', 'data-placement'=>'bottom']) !!}
    </div>
</div>


<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
</div>
