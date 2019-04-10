@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Figura Legal
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Figura Legal
                  <p class="pull-right">
                    <a href="{{ route('figuralegal.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($figuralegal, ['method' => 'PATCH', 'route' => ['figuralegal.update', $figuralegal]]) !!}
                        @include('figuralegal._form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
