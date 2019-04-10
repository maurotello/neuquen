@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Envíos para Sujeto de Crédito
@endsection
@section('main-content')


	<div class="">
		<div class="box">
			<div class="box-header">
				    <h3 class="box-title">Todos los Envíos para Sujeto de Crédito</h3>
             @can('sujetoCredito.create')
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Nuevo</button>
             @endcan
			</div>

			<div class="box-body">
				<table class="table table-responsive mdl-data-table">
          <thead>
          <tr>
              <th>Proyecto</th>
              <th>Sucursal</th>
              <th>Fecha Envío</th>
              <th>Fecha Respuesta</th>
              <th>Sujeto de Crédito</th>
              <th style="width: 15%">Opciones</th>
          </tr>
          </thead>
       
          <tbody>

						@foreach($sujetoCreditos as $x)
							<tr>
								<td>{{ $x->proyecto->nombre }}</td>
                <td>{{ $x->sucursal->nombre }}</td>
                <td>{{ $x->fecha_envio_banco }}</td>
                <td>{{ $x->fecha_respuesta_banco }}</td>
                <td>{{ $x->sujeto_credito }}</td>
								<td>
                  @can('sujetoCredito.edit')
    									<button class="btn btn-info" data-nombre="{{ $x->nombre }}" data-id={{$x->id}} data-toggle="modal" data-target="#edit">Editar</button>
                  @endcan
                   @can('sujetoCredito.destroy')
									   <button class="btn btn-danger" data-id={{$x->id}} data-toggle="modal" data-target="#delete">Borrar</button>
                   @endcan
								</td>
							</tr>

						@endforeach
					</tbody>


				</table>
			</div>
		</div>
	</div>



	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 750px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Sujeto Crédito</h4>
      </div>
      <form action="{{ route('periodicidad.store') }}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('sujetocreditos.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content"  style="width: 750px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Sujeto Crédito</h4>
      </div>
      <form action="{{route('periodicidad.update','test')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="id" id="id" value="">
				    @include('sujetocreditos.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar cambios</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Confirmación</h4>
      </div>
      <form action="{{route('periodicidad.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Está seguro que desea eliminar este item?
				</p>
	      		<input type="hidden" name="id" id="id" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancelar</button>
	        <button type="submit" class="btn btn-warning">SI, Borrar</button>
	      </div>
      </form>
    </div>
  </div>
</div>

@endsection
