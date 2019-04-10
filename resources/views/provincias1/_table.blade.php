<table id="table" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Código</th>

        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Nombre</th>
        <th>Código</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($provincia as $td)
        <tr>
            <td>{{ $td->nombre }}</td>
            <td>{{ $td->codigo }}</td>
            <td>
                <a href="{{ route('provincia.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>

                <a href="{{ route('provincia.delete', $td->slug) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
