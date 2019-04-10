@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Localidades
@endsection
@section('main-content')
@if(Session::has('message'))
    {{Session::get('message')}}
@endif

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="box-header panel-heading">
                    <h3 class="box-title">Localidades</h3>
                    @can('localidad.create')
                    <a style="margin-right: 40px;" href="{{ route('localidad.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Nueva
                    </a>
                    @endcan
                </div>
                @include('localidades._table')
            </div>
        </div>
    </div>
</div>
@endsection
