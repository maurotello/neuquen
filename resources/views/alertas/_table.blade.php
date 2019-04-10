<table id="table" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Mensaje</th>
        <th>Estado</th>
        <th>Días</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Nombre</th>
        <th>Mensaje</th>
        <th>Estado</th>
        <th>Días</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($alertas as $x)
        <tr>
            <td>{{ $x->nombre }}</td>
            <td>{{ $x->mensaje }}</td>
            <td>{{ $x->estado }}</td>
            <td>{{ $x->dias }}</td>
            <td>
                <a href="{{ route('alerta.edit', $x) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>

                <a href="{{ route('alerta.delete', $x) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
