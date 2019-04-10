@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Proyectos
@endsection

@if(Session::has('message'))
    {{Session::get('message')}}
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Proyecto
                  <p class="pull-right">
                    <a href="{{ route('proyecto.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'proyecto.store']) }}
                        @include('proyectos.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
