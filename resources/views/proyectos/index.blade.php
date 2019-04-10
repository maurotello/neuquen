@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Proyectos
@endsection
@section('main-content')
@if(Session::has('message'))
    {{Session::get('message')}}
@endif


<div class="row">
    <div class="col-md-3">
        <button id="search" type="button" class="btn btn-primary" style="float: left; position: relative; overflow: hidden; width: 100%;">Búsqueda Avanzada</button><br />
    </div>
</div>
<div class="row busqueda_avanzada" style="display: none">
        
                    {{ Form::open(['route' => 'proyecto.search']) }}
                        <div class="row">
                            <div class="col-md-2">
                                <span class="etiqueta">Fecha Ingreso desde<input class="form-control" type="text" id="fechaIngreso_desde" name="fechaIngreso_desde"></span>
                                <span class="etiqueta">Fecha Ingreso hasta<input class="form-control hasta" type="text" id="fechaIngreso_hasta" name="fechaIngreso_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">Envío Banco desde<input class="form-control" type="text" id="fechaEnvioBanco_desde" name="fechaEnvioBanco_desde"></span>
                                <span class="etiqueta">Envío Banco hasta<input class="form-control hasta" type="text" id="fechaEnvioBanco_hasta" name="fechaEnvioBanco_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">Caduco Banco desde<input class="form-control" type="text" id="fechaCaducoBanco_desde" name="fechaCaducoBanco_desde"></span>
                                <span class="etiqueta">Caduco Banco hasta<input class="form-control hasta" type="text" id="fechaCaducoBanco_hasta" name="fechaCaducoBanco_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">Respuesta Banco desde<input class="form-control" type="text" id="fechaRespuestaBanco_desde" name="fechaRespuestaBanco_desde"></span>
                                <span class="etiqueta">Respuesta Banco hasta<input class="form-control hasta" type="text" id="fechaRespuestaBanco_hasta" name="fechaRespuestaBanco_hasta"></span>
                            </div>

                            <div class="col-md-2">
                                <span class="etiqueta">Aprobado UEP desde<input class="form-control" type="text" id="fechaAprobadoUep_desde" name="fechaAprobadoUep_desde"></span>
                                <span class="etiqueta">Aprobado UEP hasta<input class="form-control hasta" type="text" id="fechaAprobadoUep_hasta" name="fechaAprobadoUep_hasta"></span>
                            </div>
                        
                        </div>



                        <div class="row">
                            <div class="col-md-2">
                                <span class="etiqueta">Fecha Enviado CFI desde<input class="form-control" type="text" id="fechaEnviadoCfi_desde" name="fechaEnviadoCfi_desde"></span>
                                <span class="etiqueta">Fecha Enviado CFI hasta<input class="form-control hasta" type="text" id="fechaEnviadoCfi_hasta" name="fechaEnviadoCfi_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">Aprobado CFI desde<input class="form-control" type="text" id="fechaAprobadoCfi_desde" name="fechaAprobadoCfi_desde"></span>
                                <span class="etiqueta">Aprobado CFI hasta<input class="form-control hasta" type="text" id="fechaAprobadoCfi_hasta" name="fechaAprobadoCfi_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">TRAMDISPO desde<input class="form-control" type="text" id="fechaTramdispo_desde" name="fechaTramdispo_desde"></span>
                                <span class="etiqueta">TRAMDISPO hasta<input class="form-control hasta" type="text" id="fechaTramdispo_hasta" name="fechaTramdispo_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">COMUNICATRAN desde<input class="form-control" type="text" id="fechaComunicaTran_desde" name="fechaComunicaTran_desde"></span>
                                <span class="etiqueta">COMUNICATRAN hasta<input class="form-control hasta" type="text" id="fechaComunicaTran_hasta" name="fechaComunicaTran_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">DESEMBOLSO desde<input class="form-control" type="text" id="fechaDesembolso_desde" name="fechaDesembolso_desde"></span>
                                <span class="etiqueta">DESEMBOLSO hasta<input class="form-control hasta" type="text" id="fechaDesembolso_hasta" name="fechaDesembolso_hasta"></span>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-2">
                                <span class="etiqueta">Fecha Efectivizacón desde<input class="form-control" type="text" id="fechaEfectivizacion_desde" name="fechaEfectivizacion_desde"></span>
                                <span class="etiqueta">Fecha Efectivizacón hasta<input class="form-control hasta" type="text" id="fechaEfectivizacion_hasta" name="fechaEfectivizacion_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">Desistido desde<input class="form-control" type="text" id="fechaDesistido_desde" name="fechaDesistido_desde"></span>
                                <span class="etiqueta">Desistido hasta<input class="form-control hasta" type="text" id="fechaDesistido_hasta" name="fechaDesistido_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">Cancelado desde<input class="form-control" type="text" id="fechaCancelado_desde" name="fechaCancelado_desde"></span>
                                <span class="etiqueta">Cancelado hasta<input class="form-control hasta" type="text" id="fechaCancelado_hasta" name="fechaCancelado_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">Archivado desde<input class="form-control" type="text" id="fechaArchivado_desde" name="fechaArchivado_desde"></span>
                                <span class="etiqueta">Archivado hasta<input class="form-control hasta" type="text" id="fechaArchivado_hasta" name="fechaArchivado_hasta"></span>
                            </div>
                            <div class="col-md-2">
                                <span class="etiqueta">Último Judicial desde<input class="form-control" type="text" id="fechaJudicial_desde" name="fechaJudicial_desde"></span>
                                <span class="etiqueta">Último Judicial hasta<input class="form-control hasta" type="text" id="fechaJudicial_hasta" name="fechaJudicial_hasta"></span>
                            </div>
                        </div>


                        <div class="row">
                            
                            <div class="col-md-2">
                                <span class="etiqueta">Último Movimiento desde<input class="form-control" type="text" id="fechaUltimoMovimiento_desde" name="fechaUltimoMovimiento_desde"></span>
                                <span class="etiqueta">Último Movimiento hasta<input class="form-control hasta" type="text" id="fechaUltimoMovimiento_hasta" name="fechaUltimoMovimiento_hasta"></span>
                            </div>
                        </div>

                        <div class="form-group col-sm-11">
                            {!! Form::submit('Filtrar', ['class' => 'btn btn-success filtrar', 'id'=>'filtrarDatos']) !!}
                            
                        </div>
                    {{ Form::close() }}
       
</div>



<div class="container-fluid">
<div class="row">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-heading" style="padding-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-5 pull-left"><h4>Proyectos</h4></div>
                        <div class="col-md-5 pull-right">
                          @can('proyecto.create')
                            <a href="{{ route('proyecto.create') }}" class="btn btn-sm btn-primary pull-right">
                            Nuevo Proyecto
                            </a>
                          @endcan
                        </div>
                    </div>
                </div>
                @include('proyectos._table')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
@endpush
