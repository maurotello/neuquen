@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Sucursales
@endsection
@section('main-content')
@if(Session::has('message'))
    {{Session::get('message')}}
@endif
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sucursales
                     @can('sucursal.create')
                    <a href="{{ route('sucursal.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan
                </div>
                @include('sucursales._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
