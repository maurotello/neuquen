<table id="table" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Proyecto</th>
        <th>Fecha</th>
        <th>Nro Resolución</th>
        <th>Gracia</th>
        <th>Amortización</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
   
    <tbody>
    @foreach($refinanciaciones as $td)
        <tr>
            <td>{{ $td->proyecto->nombre }}</td>
            <td>{{ \Carbon\Carbon::parse($td->fecha)->format('d-m-Y') }}</td>
            <td>{{ $td->nroResolucion }}</td>
            <td>{{ $td->plazoGracia }}</td>
            <td>{{ $td->plazoAmortizacion }}</td>
            <td>
                @can('refinanciacion.edit')
                        <a href="{{ route('refinanciacion.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                @endcan
                @can('refinanciacion.destroy')
                        <a href="{{ route('refinanciacion.delete', $td->slug) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
