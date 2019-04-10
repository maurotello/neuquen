@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Titulares
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo titular
                  <p class="pull-right">
                    <a href="{{ route('refinanciacion.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'titular.store']) }}

                        @include('titulares._form1')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
