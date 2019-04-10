<div class="form-group col-sm-8">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'minlength' =>'4', 'maxlength' =>'200'])
    !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
</div>
