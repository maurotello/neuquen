<div class="row">
      <div class="form-group col-sm-3">
             {!! Form::label('inversionTotal', 'Inversión Total (Monto)') !!}
             {!! Form::text('inversionTotal', null, ['class' =>'form-control'] ) !!}
      </div>
      <div class="form-group col-sm-3">
             {!! Form::label('inversionRealizada', 'Inversión Realizada (Monto)') !!}
             {!! Form::text('inversionRealizada', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-sm-3">
             {!! Form::label('inversionARealizar_af', 'Inv. a Realizar (A.F.)') !!}
             {!! Form::text('inversionARealizar_af', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-sm-3">
             {!! Form::label('inversionARealizar_ct', 'Inv. a Realizar (A.F.)') !!}
             {!! Form::text('inversionARealizar_ct', null, ['class' => 'form-control']) !!}
      </div>
</div>
<hr />
<div class="row">
      <div class="form-group col-sm-3">
             {!! Form::label('sucursal_id', 'Sucursal (Banco)') !!}
             {!! Form::select('sucursal_id', $sucursales, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
             'id' => 'select_sucursales']) !!}
      </div>
      <div class="form-group col-sm-3">
             {!! Form::label('figuraLegal_id', 'Figura Legal') !!}
             {!! Form::select('figuraLegal_id', $figurasLegales, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
             'id' => 'select_figura_legal']) !!}
      </div>
      <div class="form-group col-sm-3">
             {!! Form::label('periodicidad_id', 'Periodicidad') !!}
             {!! Form::select('periodicidad_id', $periodicidades, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
            'id' => 'select_periodicidad']) !!}
      </div>
      <div class="form-group col-sm-2">
             {!! Form::label('tasa', 'Tasa') !!}
             {!! Form::text('tasa', null, ['class' => 'form-control']) !!}
      </div>
</div>
<div class="row">
    <div class="form-group col-sm-2">
          {!! Form::label('plazoGracia', 'Plazo de Gracia') !!}
          {!! Form::number('plazoGracia', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-2">
          {!! Form::label('plazoAmortizacion', 'Plazo de Amortización') !!}
          {!! Form::number('plazoAmortizacion', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-2">
            {!! Form::label('cantidadDesembolsos', 'Cant. Desembolsos') !!}
            {!! Form::number('cantidadDesembolsos', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-3">
          {!! Form::label('destinoCredito_id', 'Destino del Crédito') !!}
          {!! Form::select('destinoCredito_id',  $destinosCreditos, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
          'id' => 'select_destino_credito']) !!}
    </div>
    <div class="form-group col-sm-2">
          {!! Form::label('garantia_id', 'Tipo de Garantia') !!}
          {!! Form::select('garantia_id',  $garantias, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
          'id' => 'select_garantia']) !!}
    </div>
</div>
<div class="row">
      <div class="form-group col-sm-11">
            {!! Form::label('descripcionGarantia', 'Descripción Garantías') !!}
            {!! Form::text('descripcionGarantia', null, ['class' => 'form-control']) !!}
      </div>
</div>
