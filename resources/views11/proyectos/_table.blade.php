<table id="table-proyectos1" class="table table-responsive mdl-data-table" style="padding-left: 5px;">
    <thead>
    <tr>
        @foreach($columnas as $c)
            <td>{{ $c->descripcion  }}</td>
        @endforeach

<!--
        <th>Fecha Ingreso</th> 
        <th>Nombre</th>
        <th>Nro CFI</th>
        <th>Localidad</th>
        <th>Estado</th>
        <th>Titular</th>
        <th>Banco</th>
        <th>Sector</th>
        <th>Monto</th>
    -->
        <th style="width: 12%">Opciones</th>
    </tr>
    </thead>
   
    <tbody>
    @foreach($proyectos as $x)
        <tr style="background-color: {{ $x->color }}">


             @foreach($columnas as $c)
               
               @php
               $nombre = $c->nombre
               @endphp
               
                @if ($c->nombre == 'localidad_id')
                    <td style="text-align:center">{{  $x->localidad->nombre }}</td>
                @elseif($c->nombre == 'estado_id')
                    <td style="text-align:center">{{ $x->estado->nombre }}</td>
                @elseif($c->nombre == 'estadoInterno_id')
                    <td style="text-align:center">{{ $x->estadoInrerno->nombre }}</td>
                @elseif($c->nombre == 'sector_id')
                    <td style="text-align:center">{{ $x->sector->nombre }}</td>
                @elseif($c->nombre == 'figuraLegal_id')
                    <td style="text-align:center">{{ $x->figuraLegal->nombre }}</td>
                @elseif($c->nombre == 'periodicidad_id')
                   <td style="text-align:center">{{ $x->periodicidad->nombre }}</td>
                @elseif($c->nombre == 'destinoCredito_id')
                   <td style="text-align:center">{{ $x->destinoCredito->nombre }}</td>
                @elseif($c->nombre == 'lineaCredito_id')
                   <td style="text-align:center">{{ $x->lineaCredito->nombre }}</td>
                @elseif($c->nombre == 'sucursal_id')
                   <td style="text-align:center">{{  $x->sucursal->nombre }}</td>
                @elseif($c->nombre == 'fechaIngreso')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaIngreso)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaUltimoMovimiento')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaUltimoMovimiento)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaArchivado')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaArchivado)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaCancelado')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaCancelado)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaJudicial')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaJudicial)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaDesistido')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaDesistido)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaEfectivizacion')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaEfectivizacion)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaDesembolso')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaDesembolso)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaComunicaTran')
                   <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaComunicaTran)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaTramdispo')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaComunicaTran)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaAprobadoCfi')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaAprobadoCfi)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaEnviadoCfi')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaEnviadoCfi)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaAprobadoUep')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaAprobadoUep)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaCaducoBanco')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaCaducoBanco)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaRespuestaBanco')
                    <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaRespuestaBanco)->format('d-m-Y') }}</td>
                @elseif($c->nombre == 'fechaEnvioBanco')
                   <td style="text-align:center">{{ \Carbon\Carbon::parse($x->fechaEnvioBanco)->format('d-m-Y') }}</td>
                @else
                    <td style="text-align:center">{{  $x->$nombre }}</td>
                @endif

             @endforeach

            <td>
                @can('proyecto.edit')
                    <a href="{{ route('proyecto.edit', $x) }}" class="btn btn-info btn-xs pull-rigth" style="margin-right: 5px"><i class="fa fa-edit" title="Editar Proyecto"></i></a>
                @endcan
                @can('proyecto.show')
                    <a href="{{ route('proyecto.show', $x) }}" class="btn btn-info btn-xs pull-rigth"  style="margin-right: 5px"><i class="fa fa-eye" title="Ver Proyecto"></i></a>
                @endcan
                @can('proyecto.delete')
                    <a href="{{ route('proyecto.delete', $x) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger"><i class="fa fa-trash" title="Borrar Proyecto"></i></a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
