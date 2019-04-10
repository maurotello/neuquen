@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Columnas para el Informe de Excel
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Columna
                  <p class="pull-right">
                    <a href="{{ route('columnasview.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'columnasview.store']) }}

                        @include('columnasviews._form')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
