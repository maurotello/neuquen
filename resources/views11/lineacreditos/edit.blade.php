@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Líneas de Créditos
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Línea de Crédito
                  <p class="pull-right">
                    <a href="{{ route('lineacredito.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($lineacredito, ['method' => 'PATCH', 'route' => ['lineacredito.update', $lineacredito]]) !!}
                        @include('lineacreditos._form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
