<table id="table-titulares" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
        <th>Proyecto</th>
        <th>Apellido y Nombre Titular</th>
        <th>Teléfono</th>
        <th>mail</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($titulares as $td)
        <tr>
            <td>{{ $td->proyecto->nombre }}</td>
            <td>{{ $td->apeynom }}</td>
            <td>{{ $td->telefono }}</td>
            <td>{{ $td->mail }}</td>
            <td>
                @can('titular.edit')
                        <a href="{{ route('titular.edit', $td) }}" class="btn btn-info btn-xs pull-rigth" style="margin-right: 5px"><i class="fa fa-edit" title="Editar Titular"></i></a>
                @endcan
                @can('titular.ahow')
                        <a href="{{ route('titular.show', $td) }}" class="btn btn-info btn-xs pull-rigth"  style="margin-right: 5px"><i class="fa fa-eye" title="Ver Titular"></i></a>
                @endcan
                @can('titular.destroy')
                        <a href="{{ route('titular.delete', $td) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger"><i class="fa fa-trash" title="Borrar Titular"></i></a>
                @endcan

                <!--
                <a href="{{ route('titular.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                <a href="{{ route('titular.delete', $td->slug) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            -->
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
@endpush