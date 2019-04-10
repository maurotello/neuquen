<table id="table" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
        <th>Proyecto</th>
        <th>Fecha</th>
        <th>Nombre</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Proyecto</th>
        <th>Fecha</th>
        <th>Nombre</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($anexos as $p)
        <tr>

            <td>{{ $x->proyecto->nombre }}</td>
            <td>{{ \Carbon\Carbon::parse($p->fecha)->format('d-m-Y') }}</td>
            <td>{{ $x->nombre }}</td>
            <td>
                <a href="{{ route('anexoProyecto.edit', $p) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                <a href="{{ route('anexoProyecto.show', $p) }}" class="btn btn-info btn-xs pull-rigth">Ver</a>
                <a href="{{ route('anexoProyecto.delete', $p) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
