@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Titulares
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
                        <div class="col-md-5 pull-left"><h4>Titulares</h4></div>
                        <div class="col-md-5 pull-right">
                             @can('titular.create')
                            <a href="{{ route('titular.create') }}" class="btn btn-sm btn-primary pull-right">
                            Nuevo Titular
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
                @include('titulares._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
@endpush
