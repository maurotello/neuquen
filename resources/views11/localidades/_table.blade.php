<table id="table" class="table table-responsive table-striped table-bordered">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>CP</th>
        <th>Zona</th>
        <th>Departamento</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    
    <tbody>
    @foreach($localidades as $td)
        <tr>
            <td>{{ $td->nombre }}</td>
            <td>{{ $td->cp }}</td>
            @if ($td->zona)
                <td>{{ $td->zona->nombre }}</td>
            @else
                <td></td>
            @endif
            @if ($td->dpto)
                <td>{{ $td->dpto->nombre }}</td>
            @else
                <td></td>
            @endif
            <td>
                 @can('localidad.edit')
                        <a href="{{ route('localidad.edit', $td) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                @endcan
                 @can('localidad.delete')
                        <a href="{{ route('localidad.delete', $td) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
                 @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
