@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estado
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Estado Interno
                  <p class="pull-right">
                    <a href="{{ route('estadointerno.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($estadointerno, ['method' => 'PATCH', 'route' => ['estadointerno.update', $estadointerno]]) !!}
                        @include('estadointerno._form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
