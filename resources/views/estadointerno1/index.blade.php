@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estados Internos
@endsection
@section('main-content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Estado Interno
                    @can('estadointerno.create')
                    <a href="{{ route('estadointerno.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan
                </div>
                @include('estadointerno._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
