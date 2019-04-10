@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Sectores
@endsection
@section('main-content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sector
                    @can('sector.create')
                    <a href="{{ route('sector.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan
                </div>
                @include('sectores._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
