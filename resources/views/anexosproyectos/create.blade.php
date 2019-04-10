@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Proyectos
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Anexo de Proyecto
                  <p class="pull-right">
                    <a href="{{ route('anexoProyecto.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['anexoProyecto.store'], 'enctype' => 'multipart/form-data']) !!}
                        @include('anexosproyectos.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
