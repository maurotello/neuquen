<table id="table" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Monto</th>
        <th>Plazo Gracia</th>
        <th>Plazo Amortización</th>


        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
   
    <tbody>
    @foreach($lineacreditos as $td)
        <tr>
            <td>{{ $td->nombre }}</td>
            <td>{{ $td->monto_maximo }}</td>
            <td>{{ $td->gracia_maximo }}</td>
            <td>{{ $td->amortizacion_maximo }}</td>
            <td>
                @can('lineacredito.edit')
                <a href="{{ route('lineacredito.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                @endcan
                @can('lineacredito.delete')
                    <a href="{{ route('lineacredito.delete', $td->slug) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
