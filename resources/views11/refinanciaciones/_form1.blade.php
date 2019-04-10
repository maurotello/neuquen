
<div class="row">
    <div class="form-group col-sm-11">
        {!! Form::label('proyecto_id', 'Proyecto') !!}
        <input type="text" id="proyecto_nombre" class="form-control" name="proyecto_nombre" value="{{ $proyectos->nombre  }}" />
        <input style="visibility:hidden" type="text" id="proyecto_id" class="form-control" name="proyecto_id" value="{{ $proyectos->id }}" />
        
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('fecha', 'Fecha') !!}
        {!! Form::text('fecha', null, ['id'=>'fecha_refinanciacion', 'class' => 'form-control', 'required'])
        !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('montoRefinanciar', 'Monto a Refinanciar') !!}
        {!! Form::text('montoRefinanciar', null, ['class' => 'form-control', 'required'])
        !!}
    </div>
        <div class="form-group col-sm-4">
        {!! Form::label('nroResolucion', 'Nº Resol.') !!}
        {!! Form::text('nroResolucion', null, ['class' => 'form-control', 'required'])
        !!}
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('tasa', 'Tasa') !!}
        {!! Form::text('tasa', null, ['class' => 'form-control'])
        !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('plazoGracia', 'Plazo Gracia(meses)') !!}
        {!! Form::text('plazoGracia', null, ['class' => 'form-control'])
        !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('plazoAmortizacion', 'Amortización(meses)') !!}
        {!! Form::text('plazoAmortizacion', null, ['class' => 'form-control'])
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
