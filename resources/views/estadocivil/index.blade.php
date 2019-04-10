@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estado Civil
@endsection
@section('main-content')
@if(Session::has('message'))
    {{Session::get('message')}}
@endif

	<div style="padding-left: 50px; padding-right: 50px;">
      <div class="box">
        <div class="box-header panel-default panel-heading">
				    <h3 class="box-title">Todos los Estads Civiles</h3>
            @can('estadoCivil.create')
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Nuevo</button>
            @endcan
			</div>

			<div class="box-body">
				<table class="table table-responsive table-striped table-bordered">
          <thead>
          <tr>
              <th>Nombre</th>
              <th style="width: 15%">Opciones</th>
          </tr>
          </thead>
         
          <tbody>

						@foreach($estadoCivil as $x)
							<tr>
								<td>{{$x->nombre}}</td>
								<td>
                  @can('estadoCivil.edit')
									   <button class="btn btn-xs btn-info" data-nombre="{{ $x->nombre }}" data-id={{$x->id}} data-toggle="modal" data-target="#edit">Editar</button>
                  @endcan
									@can('estadoCivil.destroy')
                      <button onclick="return confirm('Está seguro que desea eliminar este ítem?')" class="btn btn-xs btn-danger" data-id={{$x->id}} data-toggle="modal" data-target="#delete">Borrar</button>
                  @endcan
								</td>
							</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Estado Civil</h4>
      </div>
      <form action="{{ route('estadoCivil.store') }}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('estadocivil.form')
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
        <h4 class="modal-title" id="myModalLabel">Editar Estado Civil</h4>
      </div>
      <form action="{{route('estadoCivil.update','test')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="id" id="id" value="">
				    @include('estadocivil.form')
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
      <form action="{{route('estadoCivil.destroy','test')}}" method="post">
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
