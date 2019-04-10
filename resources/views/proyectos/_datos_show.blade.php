<div class="row">
     <div class="form-group col-sm-3 show" >
       <span class="etiqueta">Número Interno</span><br />
            {{ $proyecto->numeroInterno }}
     </div>
     <div class="form-group col-sm-3 show">
       <span class="etiqueta">Nro CFI </span><br />
            {{ $proyecto->numeroCfi }}
     </div>
     <div class="form-group col-sm-3 show">
       <span class="etiqueta">CIIU </span><br />
            {{ $proyecto->ciuu }}
     </div>
     <div class="form-group col-sm-2 show">
       <span class="etiqueta">MO </span><br />
            {{ $proyecto->mo }}
     </div>
</div>
<div class="row">
     <div class="form-group col-sm-5 show" >
       <span class="etiqueta">Domicilio Legal </span><br />
            {{ $proyecto->domicilioLegal }}
     </div>
     <div class="form-group col-sm-5 show">
     <span class="etiqueta">Domicilio Proyecto</span><br />
            {{ $proyecto->domicilioProyecto }}
     </div>
</div>
<div class="row">
     <div class="form-group col-sm-4 show">
     <span class="etiqueta">Teléfono</span><br />
            {{ $proyecto->telefono }}
     </div>
     <div class="form-group col-sm-3 show">
     <span class="etiqueta">E-mail </span><br />
            {{ $proyecto->email }}
     </div> 
     <div class="form-group col-sm-4 show">
     <span class="etiqueta">Sitio Web</span><br />
            {{ $proyecto->web }}
     </div>
</div>
<div class="row">
     <div class="form-group col-sm-6 show">
     <span class="etiqueta">Producto </span><br />
            {{ $proyecto->productos }}
     </div>
  
     <div class="form-group col-sm-3 show">
     <span class="etiqueta">En UEP </span><br />
            {{ $proyecto->enuep }}
     </div>
</div>
<div class="row">
     <div class="form-group col-sm-3 show">
     <span class="etiqueta">Tamaño </span><br />
           {{ $proyecto->tamanio }}
     </div>
</div>

<div class="row">
     <div class="form-group col-sm-11 show">
     <span class="etiqueta">Descripción </span><br />
        {{ $proyecto->descripcion }}
     </div>
</div>
