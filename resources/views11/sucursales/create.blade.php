@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Sucursal
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Sucursal
                  <p class="pull-right">
                    <a href="{{ route('sucursal.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'sucursal.store']) }}

                        @include('sucursales._form')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
