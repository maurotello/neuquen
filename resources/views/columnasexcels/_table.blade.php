<table id="table-columnasexcel" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
        <th>Ordcen</th>
        <th>Descripción</th>
        <th>Seleccionada?</th>
        
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($columnasexcel as $td)
        <tr>
            <td>{{ $td->orden }}</td>
            <td>{{ $td->descripcion }}</td>
            <td>{{ $td->seleccionada }}</td>
            
            <td>
                @can('columnasexcel.edit')
                        <a href="{{ route('columnasexcel.edit', $td) }}" class="btn btn-info btn-xs pull-rigth" style="margin-right: 5px"><i class="fa fa-edit" title="Editar"></i></a>
                @endcan
               
                @can('columnasexcel.delete')
                        <a href="{{ route('columnasexcel.delete', $td) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger"><i class="fa fa-trash" title="Borrar"></i></a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
