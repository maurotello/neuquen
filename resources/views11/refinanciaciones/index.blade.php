@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Refinanciaciones
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
                    Refinanciaciones
                    @can('refinanciacion.create')
                        <a href="{{ route('refinanciacion.create') }}"
                        class="btn btn-sm btn-primary pull-right">
                            Crear
                        </a>
                    @endecan
                </div>
                @include('refinanciaciones._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
