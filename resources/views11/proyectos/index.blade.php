@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Proyectos
@endsection
@section('main-content')
@if(Session::has('message'))
    {{Session::get('message')}}
@endif

<div class="container-fluid">
<div class="row">


  <!--
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Events</span>
                              <span class="info-box-number">41,410</span>

                              
                                  <span class="progress-description">
                                    70% Increase in 30 Days
                                  </span>
                            </div>
                         
                          </div>
                 
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Events</span>
                                <span class="info-box-number">41,410</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                  <span class="progress-description">
                                    70% Increase in 30 Days
                                  </span>
                            </div>
                
                        </div>
           
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Events</span>
                              <span class="info-box-number">41,410</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                                  <span class="progress-description">
                                    70% Increase in 30 Days
                                  </span>
                            </div>
                      
                          </div>
             
                    </div>
             
</div>
-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-heading" style="padding-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-5 pull-left"><h4>Proyectos</h4></div>
                        <div class="col-md-5 pull-right">
                          @can('proyecto.create')
                            <a href="{{ route('proyecto.create') }}" class="btn btn-sm btn-primary pull-right">
                            Nuevo Proyecto
                            </a>
                          @endcan
                        </div>
                    </div>
                </div>
                @include('proyectos._table')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
@endpush
