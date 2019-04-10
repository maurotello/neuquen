@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Refinanciaciones
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Refinanciación
                  <p class="pull-right">
                    <a href="{{ route('refinanciacion.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'refinanciacion.store']) }}

                        @include('refinanciaciones._form')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
