<div class="form-group col-sm-8">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'minlength' =>'4', 'maxlength' =>'200'])
    !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('codigo', 'Código') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control', 'required', 'minlength' =>'1', 'maxlength' =>'10'])
    !!}
</div>
