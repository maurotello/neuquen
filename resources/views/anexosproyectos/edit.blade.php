@extends('adminlte::layouts.app')

@section('htmlheader_title')
    anel Proyecto
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Anexo
                  <p class="pull-right">
                    <a href="{{ route('anexoProyecto.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                  {!! Form::model($anexoProyecto, ['method' => 'PATCH', 'route' => ['anexoProyecto.update', $anexoProyecto], 'enctype' => 'multipart/form-data']) !!}
                        @include('localidades.form')
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
