@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Proyectos
@endsection

@if(Session::has('message'))
    {{Session::get('message')}}
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-5 pull-left"><h4>Editando Proyecto</h4></div>
                        <div class="col-md-5 pull-right">

                            <a href="{{ route('proyecto.index') }}" class="btn btn-sm btn-primary pull-right">
                            Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                  {!! Form::model($proyecto, ['id'=>'editando_proyecto', 'method' => 'PATCH', 'route' => ['proyecto.update', $proyecto], 'enctype' => 'multipart/form-data']) !!}
                        @include('proyectos.form')
                  {!! Form::close() !!}
                </div>
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addMovimiento" data-whatever="{{ $proyecto->id }}">Agregar Movimiento</button>
                            
                            <h4>Listado de Movimientos</h4>
                        </div>
                    </div>
                    <table id="table" class="table table-striped table-bordered" style="margin-left: 15px; width: 95%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Fecha</th>
                            <th>Descripcion</th>
                            <th>Usuario</th>

                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($movimientos as $x)
                            <tr>
                                <td>
                                    <button class="delete_movimiento1" id="delete_movimiento1" type="button" class="btn btn-info btn-xs pull-rigth" onclick="borrar_movimiento({{ $x->id  }});"><i class="fa fa-trash" title="Borrar Movimiento"></i></button>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($x->fecha)->format('d-m-Y') }}</td>
                                <td>{{ $x->descripcion }}</td>
                                <td>{{ $x->user->name }}</td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div style="margin-top: 85px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ route('refinanciacion.create1', $proyecto->id) }}" type="button" class="btn btn-primary pull-right">Refinanciar Proyecto</a>
                            
                            <h4>Refinanciación</h4>
                        </div>
                    </div>
                    <table id="table" class="table table-striped table-bordered" style="margin-left: 15px; width: 95%;">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Resolución</th>
                            <th>Monto</th>
                            <th>Plazo Gracia</th>
                            <th>Plazo Amort.</th>

                        </tr>
                        </thead>
                        
                        <tbody>
                        @if ($refinanciaciones)
                        @foreach($refinanciaciones as $td)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($td->fecha)->format('d-m-Y') }}</td>
                                <td>{{ $td->nroResolucion }}</td>
                                <td>{{ $td->montoRefinanciar }}</td>
                                <td>{{ $td->plazoGracia }}</td>
                                <td>{{ $td->plazoAmortizacion }}</td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>


                <div style="margin-top: 85px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ route('titular.create1', $proyecto->id) }}" type="button" class="btn btn-primary pull-right">Nuevo Titular</a>
                            
                            <h4>Titulares</h4>
                        </div>
                    </div>
                    <table id="table" class="table table-striped table-bordered" style="margin-left: 15px; width: 95%;">
                        <thead>
                        <tr>
                            <td></td>
                            <th>Apellido y Nombre</th>
                            <th>DNI</th>
                            <th>Localidad</th>
                            <th>Estado Civil</th>
                           

                        </tr>
                        </thead>
                        
                        <tbody>
                        @if ($titulares)
                        @foreach($titulares as $td)
                            <tr>
                                <td><button class="delete_titular1" id="delete_titular1" type="button" class="btn btn-info btn-xs pull-rigth" onclick="borrar_titular({{ $td->id  }});"><i class="fa fa-trash" title="Borrar Titular"></i></button></td>
                                <td>{{ $td->apeynom }}</td>
                                <td>{{ $td->dni }}</td>
                                @if($td->localidad)
                                    <td>{{ $td->localidad->nombre }}</td>
                                @else
                                    <td></td>
                                @endif
                                @if($td->estadoCivil)
                                    <td>{{ $td->estadoCivil->nombre }}</td>
                                @else
                                    <td></td>
                                @endif
                                
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>




            </div>
        </div>
    </div>
</div>
@include('proyectos.create_movimiento')
@include('proyectos.create_desembolso')
@include('proyectos.create_sujeto')

@endsection
