@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Anexos de Proyectos
@endsection
@section('main-content')


	<div class="">
		<div class="box">
			<div class="box-header">
				    <h3 class="box-title">Todos los Anexos de los proyectos</h3>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Nuevo</button>
			</div>

			<div class="box-body">
				<table class="table table-responsive mdl-data-table">
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

				@foreach($anexos as $x)
		            <tr>
						<td>{{ $x->proyecto->nombre }}</td>
                        <td>{{ $x->fecha }}</td>
                        <td>{{ $x->nombre }}</td>
						<td>
							<button class="btn btn-info" data-nombre="{{ $x->nombre }}" data-id={{$x->id}} data-toggle="modal" data-target="#edit">Editar</button>
                            <a href="{{ route('anexoProyecto.show', $p) }}" class="btn btn-info btn-xs pull-rigth">Ver</a>
							<button class="btn btn-danger" data-id={{$x->id}} data-toggle="modal" data-target="#delete">Borrar</button>
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
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Anexo</h4>
      </div>
      <form action="{{ route('anexoProyecto.store') }}" method="post", enctype="multipart/form-data">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('anexosproyectos.form')
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
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Anexo</h4>
      </div>
      <form action="{{route('anexoProyecto.update','test')}}" method="post" , enctype="multipart/form-data">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="id" id="id" value="">
				    @include('anexosproyectos.form_edit')
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
      <form action="{{route('anexoProyecto.destroy','test')}}" method="post">
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
