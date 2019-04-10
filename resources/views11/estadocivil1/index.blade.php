@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estado
@endsection
@section('main-content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Estado
                    @can('estadocivil.create')
                    <a href="{{ route('estadocivil.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan
                </div>
                @include('estadocivil._table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>

@endpush
