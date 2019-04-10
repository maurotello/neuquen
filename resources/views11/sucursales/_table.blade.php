<table id="table" class="table table-responsive mdl-data-table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th style="width: 15%">Opciones</th>
    </tr>
    </thead>
   
    <tbody>
    @foreach($sucursales as $x)
        <tr>
            <td>{{ $x->nombre }}</td>
            <td>{{ $x->telefono }}</td>
            <td>{{ $x->email }}</td>
            <td>
                @can('sucursal.edit')
                    <a href="{{ route('sucursal.edit', $x) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                @endcan
                @can('sector.show')
                    <a href="{{ route('sucursal.show', $x) }}" class="btn btn-info btn-xs pull-rigth">Ver</a>
                @endcan
                @can('sector.destroy')
                    <a href="{{ route('sucursal.delete', $x) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-danger">Eliminar</a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
