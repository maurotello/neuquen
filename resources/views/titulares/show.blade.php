@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Titulares
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="overflow: hidden; margin-bottom: 20px;" class="panel-heading">
                	<div style="position: relative; float: left; width: 40%; overflow: hidden"><h5>Visualizando Titular</h5></div>
                	<div style="position: relative; float: right; width: 20%; overflow: hidden"><a href="{{ route('titular.index') }}" class="btn btn-sm btn-primary pull-right">Volver</a></div>
                		
                </div>
                <div class="clearfix"></div>
    			<div class="divider"></div>

			    <div class="panel panel-success col-sm-12">
			        <div class="panel-heading">
			            <h3 class="panel-title  text-center"> <strong>Apellido y Nombre : {{ $titular->apeynom }}</strong></h3>
			        </div>
			        <div class="panel-body">
			        	<div class="row">
				        	<div class="col-sm-12">
				            	<h5 class="text-left"><strong>Proyecto: </strong> {{ $titular->proyecto->nombre }}</h5>
				            </div>
			        	</div>
			        	<hr>
			        	<div class="row">
				        	<div class="col-sm-6">
				            	<h5 class="text-left"><strong>DNI: </strong>{{ $titular->dni }}</h5>
				            	<!-- $derivacion->created_at->format('d-m-Y') -->
				            </div>
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>CUIT: </strong> {{ $titular->cuit }}</h5>
				            </div>
			            </div>
			            <div class="row">
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>Fecha Nac.: </strong> {{ \Carbon\Carbon::parse($titular->fecha_nacimiento)->format('d-m-Y') }}</h5>
				            </div>
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>Teléfono: </strong> {{ $titular->telefono }}</h5>
				            </div>
			            </div>
			            <div class="row">
				            <div class="col-sm-12">
				            	<h5 class="text-left"><strong>Domicilio: </strong> {{ $titular->domicilioLegal }}</h5>
				            </div>
			            </div>

			            <div class="row">
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>E-mail: </strong> {{ $titular->mail }}</h5>
				            </div>
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>Estado Civil: </strong> {{ $titular->estadoCivil->nombre }}</h5>
				            </div>
			            </div>
			            <div class="row">
				            <div class="col-sm-12">
				            	<h5 class="text-left"><strong>Localidad: </strong> {{ $titular->localidad->nombre }}</h5>
				            </div>
			            </div>

			            <div class="clearfix"></div>
    					<hr>

    					<div class="row">
				        	<div class="col-sm-12">
				            	<h5 class="text-left"><strong>Cónyuge: </strong> {{ $titular->apeynom_conyuge }}</h5>
				            </div>
			        	</div>

			        	<div class="row">
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>Fecha Nac.: </strong> {{ \Carbon\Carbon::parse($titular->fecha_nacimiento_conyuge)->format('d-m-Y') }}</h5>
				            </div>
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>Teléfono: </strong> {{ $titular->telefono_conyuge }}</h5>
				            </div>
			            </div>

			            <div class="row">
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>DNI: </strong> {{ $titular->dni_conyuge }}</h5>
				            </div>
				            <div class="col-sm-6">
				            	<h5 class="text-left"><strong>CUIT: </strong> {{ $titular->cuit_conyuge }}</h5>
				            </div>
			            </div>

			            <div class="row">
				        	<div class="col-sm-12">
				            	<h5 class="text-left"><strong>Descripción: </strong> {{ $titular->descripcion }}</h5>
				            </div>
			        	</div>

			            <br /> 
			            <br />

			        </div>
		        </div>


               
            </div>
        </div>
    </div>
</div>
@endsection
