<div class="col-md-11" style="border-bottom: 2px solid #cccccc">
      <div class="row">
         <div class="form-group col-sm-5">
                 {!! Form::label('fechaEnvioBanco', 'Envío Banco') !!}
                 {!! Form::text('fechaEnvioBanco', null, ['class' =>'form-control'] ) !!}
         </div>
         <div class="form-group col-sm-5">
                 {!! Form::label('fechaRespuestaBanco', 'Respuesta Banco') !!}
                 {!! Form::text('fechaRespuestaBanco', null, ['class' => 'form-control']) !!}
         </div>
      </div>
      <hr />

      <div class="row">
           <div class="form-group col-sm-3">
                   {!! Form::label('fechaCaducoBanco', 'Caduco Banco') !!}
                   {!! Form::text('fechaCaducoBanco', null, ['class' =>'form-control'] ) !!}
           </div>
           <div class="form-group col-sm-3">
                   {!! Form::label('fechaAprobadoUep', 'Aprobado UEP') !!}
                   {!! Form::text('fechaAprobadoUep', null, ['class' => 'form-control']) !!}
           </div>
           <div class="form-group col-sm-3">
                   {!! Form::label('fechaEnviadoCfi', 'Envío al CFI') !!}
                   {!! Form::text('fechaEnviadoCfi', null, ['class' => 'form-control']) !!}
           </div>
           <div class="form-group col-sm-3">
                   {!! Form::label('fechaAprobadoCfi', 'Aprobado CFI') !!}
                   {!! Form::text('fechaAprobadoCfi', null, ['class' => 'form-control']) !!}
           </div>

      </div>
      <div class="row">
            <div class="form-group col-sm-3">
                    {!! Form::label('fechaTramdispo', 'TRAMDISPO') !!}
                    {!! Form::text('fechaTramdispo', null, ['class' => 'form-control']) !!}
            </div>
           <div class="form-group col-sm-3">
                   {!! Form::label('fechaComunicaTran', 'COMUNICATRAN') !!}
                   {!! Form::text('fechaComunicaTran', null, ['class' =>'form-control'] ) !!}
           </div>
           <div class="form-group col-sm-3">
                   {!! Form::label('fechaDesembolso', 'Desembolso') !!}
                   {!! Form::text('fechaDesembolso', null, ['class' => 'form-control']) !!}
           </div>
           <div class="form-group col-sm-3">
                   {!! Form::label('fechaEfectivizacion', 'Efectivización') !!}
                   {!! Form::text('fechaEfectivizacion', null, ['class' => 'form-control']) !!}
           </div>

      </div>

      <div class="row">
            <div class="form-group col-sm-3">
                    {!! Form::label('fechaDesistido', 'Desistido') !!}
                    {!! Form::text('fechaDesistido', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-3">
                    {!! Form::label('fechaJudicial', 'JUDICIAL') !!}
                    {!! Form::text('fechaJudicial', null, ['class' =>'form-control'] ) !!}
            </div>

            <div class="form-group col-sm-3">
                   {!! Form::label('fechaCancelado', 'Cancelado') !!}
                   {!! Form::text('fechaCancelado', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-3">
                   {!! Form::label('fechaArchivado', 'Archivado') !!}
                   {!! Form::text('fechaArchivado', null, ['class' => 'form-control']) !!}
            </div>
      </div>
      <div class="row">
            <div class="form-group col-sm-3">
                   {!! Form::label('fechaUltimoMovimiento', 'Último Movimiento') !!}
                   {!! Form::text('fechaUltimoMovimiento', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-3">
                   {!! Form::label('refinanciado', 'Refinanciado?') !!}
                   {!! Form::select('refinanciado', [''=>'Seleccione', 'SI'=>'SI', 'NO'=>'NO'], null, ['class' => 'form-control',  'id' => 'select_refinanciado', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
            </div>
            <div class="form-group col-sm-3">
                   {!! Form::label('cantidadDesembolsos', 'Cant. Desembolsos?') !!}
                   {!! Form::select('cantidadDesembolsos', [''=>'Seleccione', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'], null, ['class' => 'form-control',  'id' => 'select_refinanciado', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
            </div>
      </div>
</div>
<div class="col-md-11" style="margin-top: 25px; border-bottom: 2px solid #cccccc; margin-bottom: 20px">
@if ($action == 'edit')
    <div class="panel panel-default">
        <div class="panel-heading">
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addDesembolso" data-whatever="{{ $proyecto->id }}">Nuevo</button>
            <h4>Desembolsos</h4>
        </div>
    </div>
      <table id="table" class="table table-responsive mdl-data-table">
          <thead>
          <tr>
              <th></th>
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
                  <td>
                      <button type="button" class="btn btn-info btn-xs pull-rigth" data-target="#editDesembolso1" data-toggle="modal" data-whatever="{{ $x->id }}"><i class="fa fa-edit" title="Editar Proyecto"></i></button>
                  </td>
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
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addSujeto" data-whatever="{{ $proyecto->id }}">Nuevo</button>
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
                    <td>
                        <button id="editar_sujeto" type="button" class="btn btn-info btn-xs pull-rigth" data-target="#editSujeto" data-toggle="modal" data-whatever="{{ $x->id }}"><i class="fa fa-edit" title="Editar Sujeto de Crédito"></i></button>
                    </td>
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
@endif
</div>
