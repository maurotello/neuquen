<div class="row">
      <div class="form-group col-sm-3 show">
      <span class="etiqueta">Inv. Total (Monto) </span><br />
             {{ $proyecto->inversionTotal }}
      </div>
      <div class="form-group col-sm-3 show">
      <span class="etiqueta">Inv. Realizada (Monto) </span><br />
             {{ $proyecto->inversionRealizada }}
      </div>
      <div class="form-group col-sm-2 show">
      <span class="etiqueta">Inv. a Realizar (A.F.)</span><br />
             {{ $proyecto->inversionARealizar_af }}
      </div>
      <div class="form-group col-sm-2 show">
      <span class="etiqueta">Inv. a Realizar (C.T.)</span><br />
             {{ $proyecto->inversionARealizar_ct }}
      </div>
</div>
<hr />
<div class="row">
      <div class="form-group col-sm-3 show">
            <span class="etiqueta">Sucursal</span><br />
            @if ($proyecto->sucursal)
                {{ $proyecto->sucursal->nombre }}
            @endif
      </div>
      <div class="form-group col-sm-3 show">
      <span class="etiqueta">Figura Legal</span><br />
             @if ($proyecto->figuraLegal)
                {{ $proyecto->figuraLegal->nombre }}
             @endif
      </div>
      <div class="form-group col-sm-3 show">
      <span class="etiqueta">Periodicidad</span><br />
             @if ($proyecto->periodicidad)
                {{ $proyecto->periodicidad->nombre }}
             @endif
      </div>
      <div class="form-group col-sm-2 show">
      <span class="etiqueta">Tasa</span><br />
            {{ $proyecto->tasa }}
      </div>
</div>
<div class="row">
    <div class="form-group col-sm-2 show">
    <span class="etiqueta">P. Gracia</span><br />
          {{ $proyecto->plazoGracia }}
    </div>
    <div class="form-group col-sm-2 show">
    <span class="etiqueta">P. Amortiz.</span><br />
          {{ $proyecto->plazoAmortizacion }}
    </div>
    
    <div class="form-group col-sm-3 show">
    <span class="etiqueta">Destino Crédito</span><br />
          @if ($proyecto->destinoCredito)
              {{ $proyecto->destinoCredito->nombre }}
          @endif
    </div>
    <div class="form-group col-sm-3 show">
    <span class="etiqueta">Tipo de Garantía</span><br />
          @if ($proyecto->tipoGarantia)
              {{ $proyecto->tipoGarantia->nombre }}
          @endif
    </div>
</div>
<div class="row">
      <div class="form-group col-sm-2 show">
            <span class="etiqueta">Cant. Desembolsos:   </span>
            {{ $proyecto->cantidadDesembolsos }}
      </div>
</div>

<div class="row">
      <div class="form-group col-sm-11 show">
      <span class="etiqueta">Descripción Garantía</span><br />
            {{ $proyecto->descripcionGarantia }}
      </div>
</div>
