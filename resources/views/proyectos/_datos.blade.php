<div class="row">
     <div class="form-group col-sm-3">
            {!! Form::label('numeroInterno', 'Nro Interno') !!}
            {!! Form::text('numeroInterno', null, ['class' =>'form-control', 'minlength' =>'2'] ) !!}
     </div>
     <div class="form-group col-sm-3">
            {!! Form::label('numeroCfi', 'Nro CFI') !!}
            {!! Form::text('numeroCfi', null, ['class' => 'form-control']) !!}
     </div>
     <div class="form-group col-sm-3">
            {!! Form::label('ciuu', 'CIUU') !!}
            {!! Form::text('ciuu', null, ['class' => 'form-control']) !!}
     </div>
     <div class="form-group col-sm-2">
            {!! Form::label('mo', 'M.O.') !!}
            {!! Form::text('mo', null, ['class' => 'form-control']) !!}
     </div>
</div>
<div class="row">
     <div class="form-group col-sm-5">
            {!! Form::label('domicilioLegal', 'Domicilio Legal') !!}
            {!! Form::text('domicilioLegal', null, ['class' =>'form-control'] ) !!}
     </div>
     <div class="form-group col-sm-5">
            {!! Form::label('domicilioProyecto', 'Domicilio Proyecto') !!}
            {!! Form::text('domicilioProyecto', null, ['class' => 'form-control']) !!}
     </div>
</div>
<div class="row">
     <div class="form-group col-sm-4">
            {!! Form::label('telefono', 'Teléfono') !!}
            {!! Form::text('telefono', null, ['class' =>'form-control'] ) !!}
     </div>
     <div class="form-group col-sm-3">
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
     </div>
     <div class="form-group col-sm-4">
            {!! Form::label('web', 'Sitio Web') !!}
            {!! Form::text('web', null, ['class' => 'form-control']) !!}
     </div>
</div>
<div class="row">
     <div class="form-group col-sm-6">
            {!! Form::label('productos', 'Producto/s') !!}
            {!! Form::text('productos', null, ['class' =>'form-control'] ) !!}
     </div>
     <div class="form-group col-sm-2">
            {!! Form::label('mo', 'M.O.') !!}
            {!! Form::text('mo', null, ['class' => 'form-control']) !!}
     </div>
     <div class="form-group col-sm-3">
            {!! Form::label('enuep', 'En _UEP') !!}
            {!! Form::select('enuep', [''=>'Seleccione', 'ON'=>'ON', 'OFF'=>'OFF'], null, ['class' => 'form-control', 'id' => 'enuep_select', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
     </div>
</div>
<div class="row">
     <div class="form-group col-sm-3">
           {!! Form::label('tamanio', 'Tamaño') !!}
           {!! Form::select('tamanio', [''=>'Seleccione', 'MICROEMPRENDIMIENTO'=>'MICROEMPRENDIMIENTO', 'PyMES'=>'PyMES'], null, ['class' => 'form-control', 'id' => 'tamanio', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
     </div>
</div>

<div class="row">
     <div class="form-group col-sm-11">
           {!! Form::label('descripcion', 'Descripción') !!}
          {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 3, 'data-toggle'=>'tooltip', 'data-placement'=>'bottom']) !!}
     </div>
</div>
