<table id="table" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Proyecto</th>
        <th>Usuario</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Fecha</th>
        <th>Proyecto</th>
        <th>Usuario</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($movimientos as $td)
        <tr>
            <td>{{ $td->fecha }}</td>
            <td>{{ $td->proyecto->nombre }}</td>
            <td>{{ $td->usuario->username }}</td>
            <td>
                 @can('movimiento.edit')
                        <a href="{{ route('movimiento.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                 @endcan
                  @can('movimiento.destroy')
                        <a href="{{ route('movimiento.delete', $td->slug) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
                 @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
