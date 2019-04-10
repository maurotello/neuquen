@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Columnas para el Informe en Excel
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Columna
                  <p class="pull-right">
                    <a href="{{ route('columnasexcel.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($columnasexcel, ['method' => 'PATCH', 'route' => ['columnasexcel.update', $columnasexcel]]) !!}
                        @include('columnasexcels._form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
