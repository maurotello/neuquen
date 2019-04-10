<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' =>'form-control'] ) !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::text('estado', null, ['class' =>'form-control'] ) !!}
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('dias', 'Dias') !!}
        {!! Form::text('dias', null, ['class' =>'form-control'] ) !!}
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('codigo', 'Código') !!}
        {!! Form::text('codigo', null, ['class' =>'form-control'] ) !!}
    </div>


    <div class="form-group col-sm-4">
        <div class="input-group colorpicker-component formcolorpicker">
            {!! Form::label('color', 'Color') !!}
            <div class="input-group-append">
                {!! Form::text('color', null, ['id'=>'color', 'class' =>'input-group-text input-group-addon form-control', 'style'=>'width=100'] ) !!}
            </div>
            
        </div>
        
    </div>
    
</div>
<div class="row">
    <div class="form-group col-sm-11">
        {!! Form::label('mensaje', 'Mensaje') !!}
        {!! Form::textarea('mensaje', null, ['class' => 'form-control', 'rows' => 3, 'data-toggle'=>'tooltip', 'data-placement'=>'bottom']) !!}
    </div>
</div>

<br /><br />
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::submit('GUARDAR', ['class' => 'btn btn-success']) !!}
    </div>
</div>
