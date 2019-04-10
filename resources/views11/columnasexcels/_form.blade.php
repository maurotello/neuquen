<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre de la Columna') !!}
         {!! Form::text('nombre', null, ['id'=>'nombre', 'class' => 'form-control', 'required'])
        !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('descripcion', 'Descripción de la Columna') !!}
         {!! Form::text('descripcion', null, ['id'=>'descripcion', 'class' => 'form-control', 'required'])
        !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('orden', 'Orden de la Columna') !!}
         {!! Form::text('orden', null, ['id'=>'nombre', 'class' => 'form-control', 'required'])
        !!}
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('tabla', 'Tabla de la Columna') !!}
         {!! Form::text('tabla', null, ['id'=>'tabla', 'class' => 'form-control', 'required'])
        !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('seleccionada', 'Columna Seleccioanda?') !!}
         {!! Form::text('seleccionada', null, ['id'=>'tabla', 'class' => 'form-control', 'required'])
        !!}
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
</div>
