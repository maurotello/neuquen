@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Sucursales
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Editando la Sucursal
                  <p class="pull-right">
                    <a href="{{ route('lineacredito.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($sucursal, ['method' => 'PATCH', 'route' => ['sucursal.update', $sucursal]]) !!}
                        @include('sucursales._form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
