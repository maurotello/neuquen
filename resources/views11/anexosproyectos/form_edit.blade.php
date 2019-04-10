<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label('nombre', 'Ingrese el nombre que se mostrará') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'minlength' =>'4', 'maxlength' =>'100'])
        !!}
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('icon', 'Avatar') !!}
        <select name="icon" class="form-control selectpicker" id="icon">
            <option value="fa fa-file-pdf-o" data-icon="fa fa-file-pdf-o"> PDF</option>
            <option value="fa fa-file-excel-o" data-icon="fa fa-file-excel-o"> Excel</option>
            <option value="fa fa-file-word-o" data-icon="fa fa-file-word-o"> Word</option>
            <option value="fa fa-file-text-o" data-icon="fa fa-file-text-o"> Texto</option>
            <option value="fa fa-file-o" data-icon="fa fa-file-o"> Archivo</option>
        </select>
    </div>

    <div class="row" style="margin-bottom: 35px;">
        <h4>Seleccione archivos</h4>
        <div class="control-group input-group" style="margin-top:5px">
            <input id="file" type="file" class="form-control " name="file[]" multiple />
        </div>

    </div>




    </div>

</div>
