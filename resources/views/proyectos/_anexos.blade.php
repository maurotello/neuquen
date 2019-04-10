<div class="row">
    <h3>Seleccione archivos</h3>
       <br /><br />
    <div class="control-group input-group" style="margin-top:5px">


        <div class="row" style="margin-top: 30px">
                    <div class="form-group col-sm-6">
                        <label>Nombre del archivo</label>
                        {!! Form::text('nombre_archivo', null, ['class' => 'form-control'])
                        !!}
                    </div>

                    <div class="form-group col-sm-3"> .
                        <label>Icono</label>
                        <select name="icon" class="form-control selectpicker" id="select_type">
                            <option value="fa fa-file-pdf-o" data-icon="fa fa-file-pdf-o"> PDF</option>
                            <option value="fa fa-file-excel-o" data-icon="fa fa-file-excel-o"> Excel</option>
                            <option value="fa fa-file-word-o" data-icon="fa fa-file-word-o"> Word</option>
                            <option value="fa fa-file-text-o" data-icon="fa fa-file-text-o"> Texto</option>
                            <option value="fa fa-file-o" data-icon="fa fa-file-o"> Archivo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                        <label>Descripci{on del archivo</label>
                        {!! Form::textarea('descripcion_archivo', null, ['class' => 'form-control', 'rows' => 3, 'data-toggle'=>'tooltip', 'data-placement'=>'bottom']) !!}
                    </div>
                <div class="row" style="margin-bottom: 35px;">
                    <h4>Seleccione archivos</h4>
                    <div class="control-group input-group" style="margin-top:5px">
                        <input id="uploadFile" type="file" class="form-control " name="filename[]" multiple />
                    </div>.
                   
                </div>

    </div>
    <br>
    <hr>
    @if($action == 'edit')
            <h3>Archivos del Proyecto</h3>
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
                        <td><i class="{{ $anexo->icon }}"></i> &nbsp; {{ $anexo->nombre }}</td>

                        <td>
                            <a href="{{ asset($anexo->file) }}" class="btn btn-primary btn-xs pull-rigth" target="_blank">VER</a>

                          @if ("{{ $anexo->user_id }}"  == "{{ $user_id }}")
                                <a href="{{ route('anexoProyecto.deletefile', $anexo->slug) }}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este Archivo?')">BORRAR</a>
                          @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    @endif
</div>
