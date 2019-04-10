@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Columnas para el Informe en Excel
@endsection
@section('main-content')
@if(Session::has('message'))
    {{Session::get('message')}}
@endif

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-heading" style="padding-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-5 pull-left"><h4>Columnas para el Informe en Excel</h4></div>
                        <div class="col-md-5 pull-right">
                             @can('columnasexcel.create')
                            <a href="{{ route('columnasexcel.create') }}" class="btn btn-sm btn-primary pull-right">
                            Nuevo Titular
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
                @include('columnasexcels._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
@endpush
