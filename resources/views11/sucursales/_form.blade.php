<div class="row">
    <div class="form-group col-sm-8">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'minlength' =>'4', 'maxlength' =>'200'])
        !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('banco_id', 'Banco') !!}
        {!! Form::select('banco_id', $bancos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
         'id' => 'select_bancos_sucursales', 'required']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('localidad_id', 'Localidad') !!}
        {!! Form::select('localidad_id', $localidades, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
         'id' => 'select_localidades', 'required']) !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('telefono', 'Teléfono') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control'])
        !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('direccion', 'Dirección') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control'])
        !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::text('email', null, ['class' => 'form-control'])
        !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('contacto', 'Contacto') !!}
        {!! Form::text('contacto', null, ['class' => 'form-control'])
        !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('gerente', 'Gerente') !!}
        {!! Form::text('gerente', null, ['class' => 'form-control'])
        !!}
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
</div>
