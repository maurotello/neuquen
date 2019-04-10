<div class="col-md-11" style="border-bottom: 2px solid #cccccc">
      <div class="row">
         <div class="form-group col-sm-5 show">
         <span class="etiqueta">Env. Bco</span><br />
                 {{ $proyecto->fechaEnvioBanco }}
         </div>
         <div class="form-group col-sm-5 show">
         <span class="etiqueta">Respuesta Bco</span><br />
                {{ $proyecto->fechaRespuestaBanco }}
         </div>
      </div>
      <hr />

      <div class="row">
           <div class="form-group col-sm-2 show">
           <span class="etiqueta">Caduco Bco</span><br />
                   {{ $proyecto->fechaCaducoBanco }}
           </div>
           <div class="form-group col-sm-2 show">
           <span class="etiqueta">Aprobado UEP</span><br />
                   {{ $proyecto->fechaAprobadoUep }}
           </div>
           <div class="form-group col-sm-2 show">
           <span class="etiqueta">Envío al CFI</span><br />
                   {{ $proyecto->fechaEnviadoCfi }}
           </div>
           <div class="form-group col-sm-2 show">
           <span class="etiqueta">Aprobado CFI</span><br />
                   {{ $proyecto->fechaAprobadoCfi }}
           </div>
           <div class="form-group col-sm-2 show">
            <span class="etiqueta">TRAMDISPO</span><br />
                    {{ $proyecto->fechaTramdispo }}
            </div>

      </div>
      <div class="row">
            
           <div class="form-group col-sm-2 show">
           <span class="etiqueta">COMUNICATRAN</span><br />
                   {{ $proyecto->fechaComunicaTran }}
           </div>
           <div class="form-group col-sm-2 show">
           <span class="etiqueta">Desembolso</span><br />
                  {{ $proyecto->fechaDesembolso }}
           </div>
           <div class="form-group col-sm-2 show">
           <span class="etiqueta">Efectivización</span><br />
                  {{ $proyecto->fechaEfectivizacion }}
           </div>
           <div class="form-group col-sm-2 show">
            <span class="etiqueta">Desistido</span><br />
                    {{ $proyecto->fechaDesistido }}
            </div>
            <div class="form-group col-sm-2 show">
            <span class="etiqueta">Judicial</span><br />
                    {{ $proyecto->fechaJudicial }}
            </div>

      </div>

      <div class="row">
            <div class="form-group col-sm-2 show">
            <span class="etiqueta">Cancelado</span><br />
                  {{ $proyecto->fechaCancelado }}
            </div>
            <div class="form-group col-sm-2 show">
            <span class="etiqueta">Archivado</span><br />
                   {{ $proyecto->fechaArchivado }}
            </div>
            <div class="form-group col-sm-2 show">
            <span class="etiqueta">Últ. Movimiento</span><br />
                   {{ $proyecto->fechaUltimoMovimiento }}
            </div>
            <div class="form-group col-sm-2 show">
            <span class="etiqueta">Refinanciado</span><br />
                   {{ $proyecto->refinanciado }}
            </div>
           
      </div>
     
</div>
<div class="col-md-11" style="margin-top: 25px; border-bottom: 2px solid #cccccc; margin-bottom: 20px">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Desembolsos</h4>
        </div>
    </div>
      <table id="table" class="table table-responsive mdl-data-table">
          <thead>
          <tr>
              <th style="width: 10%">Fecha</th>
              <th style="width: 5%">Nro</th>
              <th style="width: 10%">Monto</th>
              <th style="width: 65%">Descripción</th>
          </tr>
          </thead>
          <tbody>
              @php
              $modal = 0;
              @endphp
          @foreach($desembolsos as $x)
              <tr>
                  <th style="width: 20%">{{ \Carbon\Carbon::parse($x->fecha)->format('d-m-Y') }}</td>
                  <th style="width: 5%">{{ $x->nro }}</td>
                  <th style="width: 10%">{{ $x->monto }}</td>
                  <th style="width: 65%">{{ $x->descripcion }}</th>
              </tr>
          @endforeach
          </tbody>
      </table>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Sujetos de Créditos</h4>
            </div>
        </div>
        <table class="table table-responsive mdl-data-table">
          <thead>
          <tr>
              <th></th>
              <th style="width: 55%">Sucursal</th>
              <th style="width: 15%">Envío</th>
              <th style="width: 15%">Respuesta</th>
              <th style="width: 10%">Aprobado?</th>
             <!--  <th style="width: 10%">Op.</th> -->
          </tr>
          </thead>
          <tbody>

            @foreach($sujetoCredito as $x)
                  <tr>
                    <th style="width: 55%">{{ $x->sucursal->nombre }}</td>
                  @if ($x->fecha_envio_banco)
                        <th style="width: 15%">{{ \Carbon\Carbon::parse($x->fecha_envio_banco)->format('d-m-Y') }}</td>
                  @else
                        <th style="width: 15%"></th>
                  @endif
                  @if ($x->fecha_respuesta_banco)
                        <th style="width: 15%">{{ \Carbon\Carbon::parse($x->fecha_respuesta_banco)->format('d-m-Y') }}</td>
                  @else
                        <th style="width: 15%"></th>
                  @endif
                  <th style="width: 10%">{{ $x->sujeto_credito }}</td>

            </tr>
            @endforeach
      </tbody>
      </table>

</div>
