@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Garantía
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Garantía
                  <p class="pull-right">
                    <a href="{{ route('garantia.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($garantia, ['method' => 'PATCH', 'route' => ['garantia.update', $garantia]]) !!}
                        @include('garantias._form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
