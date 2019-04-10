@extends('adminlte::layouts.app')

@section('htmlheader_title')
      Estados Internos
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Estado Interno
                  <p class="pull-right">
                    <a href="{{ route('estadointerno.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'estadointerno.store']) }}

                        @include('estadointerno._form')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
