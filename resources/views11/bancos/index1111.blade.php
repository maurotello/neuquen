@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Bancos
@endsection
@section('main-content')


	<div class="">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Todos los Bancos</h3>
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Nuevo</button>
			</div>

			<div class="box-body">
				<table id="example" class="table table-responsive mdl-data-table">
                      <thead>
                            <tr>
                                 <th>Nombre</th>
                                 <th style="width: 15%">Opciones</th>
                            </tr>
                      </thead>
                      <tbody>
                            @foreach($bancos as $x)
                            <tr>
                                  <td>{{$x->nombre}}</td>
                                  <td>
                                        <button class="btn btn-info" data-nombre="{{ $x->nombre }}" data-id={{$x->id}} data-toggle="modal" data-target="#edit">Editar</button>
                                      <button class="btn btn-danger" data-id={{$x->id}} data-toggle="modal" data-target="#delete">Borrar</button>
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
        <h4 class="modal-title" id="myModalLabel">Nuevo Banco</h4>
      </div>
      <form action="{{ route('banco.store') }}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('bancos.form')
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
        <h4 class="modal-title" id="myModalLabel">Editar Banco</h4>
      </div>
      <form action="{{route('banco.update','test')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="id" id="id" value="">
				    @include('bancos.form')
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
      <form action="{{route('banco.destroy','test')}}" method="post">
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
<!--
<script id="details-template" type="text/x-handlebars-template">
    <table class="table">
        <tr>
            <td>Full name:</td>
            <td>@{{nombre}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>@{{email}}</td>
        </tr>
        <tr>
            <td>Extra info:</td>
            <td>And any further details here (images etc)...</td>
        </tr>
    </table>
</script>
-->
@endsection

@section('javascript')

<!--
<script src="{{ URL::asset('public/js/admin.js') }}"></script>
-->

<script>


/* Formatting function for row details - modify as you need */
/*
function format ( d ) {
    // `d` is the original data object for the row
    return '<table class="table">'+
                    '<thead>'+
                        '<tr>'+
                            '<th>Nombre</th>'+
                            '<th>Email</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        '<tr>'+
                            '<td>'+NOMBRE+'</td>'+
                            '<td>'+EMAIL+'</td>'+
                        '</tr>'+
                    '</tbody>'+
            '</table>';
};
*/
/*
      $(document).ready(function(){
            $('.table-bancos').DataTable({
                responsive: true,
                ajax: '{!! route('banco.sucursales') !!}',
                columns: [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "searchable":     false,
                            "data":           null,
                            "defaultContent": ''
                        }
                    //    {data: 'nombre', name: 'nombre'}
                        ],
                columnDefs: [
                        {
                            targets: [ 0, 1,],
                            className: 'mdl-data-table__cell--non-numeric noVis'
                        }
                ],
                dom: 'Bfrtip',
                buttons: [
                        {
                                extend: 'copy',
                                className: 'btn btn-info',
                                exportOptions: {columns: ':visible'},
                                titleAttr: 'Copiar las Columnas Visibles',
                                text: 'Copiar',
                                init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                                }
                        },
                        {
                              extend: 'excel',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Exportar las Columnas Visibles a Excel',
                              text: 'Excel',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        },
                        {
                              extend: 'pdf',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Exportar las Columnas Visibles a PDF',
                              text: 'PDF',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        },
                        {
                              extend: 'colvis',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Ver u Ocultar Columnas de la Grilla',
                              text: 'Ver/Ocultar Columnas',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        },
                        {
                              extend: 'print',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Imprimir la Grilla',
                              text: 'Imprimir',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        }
                ]
            });


            $('#table-bancos tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });




      });
      */
</script>

@stop
