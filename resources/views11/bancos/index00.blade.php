@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Bancos
@endsection
@section('main-content')


	<div class="all">
		<div class="box">
			<div class="box-header">
				    <h3 class="box-title">Todos los Bancos</h3>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Nuevo</button>
			</div>

			<div class="box-body">
				<table class="table table-responsive table-striped table-bordered">
                  <thead>
                  <tr>
                      <th>Nombre</th>
                      <th style="width: 15%">Opciones</th>
                  </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>Nombre</th>
                      </tr>
                  </tfoot>

				</table>
			</div>
		</div>
	</div>

<!-- Modal -->


@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
<script>
         $(function() {
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ url('index') }}',
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'nombre', name: 'nombre' };
                     ]
            });
         });
</script>
@endpush
