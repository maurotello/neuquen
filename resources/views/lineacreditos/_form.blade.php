<div class="row">
    <div class="form-group col-sm-8">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'minlength' =>'4', 'maxlength' =>'200'])
        !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('monto_maximo', 'Monto máximo') !!}
        {!! Form::text('monto_maximo', null, ['class' => 'form-control', 'required'])
        !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripción') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control', 'required'])
        !!}
    </div>
</div>


<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label('gracia_maximo', 'Plazo máximo de gracia') !!}
        {!! Form::text('gracia_maximo', null, ['class' => 'form-control', 'required'])
        !!}
    </div>
    <div class="form-group col-sm-5">
        {!! Form::label('amortizacion_maximo', 'Plazo máximo de Amortización') !!}
        {!! Form::text('amortizacion_maximo', null, ['class' => 'form-control', 'required'])
        !!}
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('tasa', 'Tasa') !!}
        {!! Form::text('tasa', null, ['class' => 'form-control', 'required'])
        !!}
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
</div>
