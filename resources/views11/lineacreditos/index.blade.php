@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Líneas de Crédito
@endsection
@section('main-content')
@if(Session::has('message'))
    {{Session::get('message')}}
@endif

<div class="container-fluid">
    <div style="padding-left: 50px; padding-right: 50px;">
      <div class="box">
        <div class="box-header panel-default panel-heading">
                <div class="box-header panel-heading">
                        <h3 class="box-title">Todos las Líneas de Crédito</h3>
                        @can('lineacredito.create')
                            <a style="margin-right: 45px" href="{{ route('lineacredito.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
                        @endcan
                </div>
                @include('lineacreditos._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
