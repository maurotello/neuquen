<div class="row">
    <h3>Anexos</h3>
    <table id="table-derivacion" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th style="width: 15%">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($anexos as $anexo)
            <tr>
                <td><i class="{{ $anexo->icon }}"></i> &nbsp; {{ $anexo->nombre_archivo }}</td>
                <td>
                    <a href="{{ asset($anexo->file) }}" class="btn btn-primary btn-xs pull-rigth" target="_blank">VER</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
