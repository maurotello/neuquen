@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Localidades
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">

                <div class="box-header panel-heading">
                      <h3 class="box-title">Nueva Localidad</h3>
                      @can('localidad.create')
                      <a style="margin-right: 40px;" href="{{ route('localidad.index') }}"
                      class="btn btn-sm btn-primary pull-right">
                          Volver
                      </a>
                      @endcan
                </div>




                <div class="panel-body">
                    {{ Form::open(['route' => 'localidad.store']) }}

                        @include('localidades.form')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
