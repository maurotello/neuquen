<div class="box-body">
				<table id="example" class="table table-responsive table-striped table-bordered">
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
                                      @can('banco.edit')
                                      <button class="btn btn-xs btn-info" data-nombre="{{ $x->nombre }}" data-id={{$x->id}} data-toggle="modal" data-target="#edit">Editar</button>
                                      @endcan
                                      @can('banco.destroy')
                                        <button onclick="return confirm('Está seguro que desea eliminar este ítem?')"  class="btn btn-xs btn-danger" data-id={{$x->id}} data-toggle="modal" data-target="#delete">Borrar</button>
                                      @endcan
                                  </td>
                            </tr>
                            @endforeach
                      </tbody>

				</table>
			</div>