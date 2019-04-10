@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">


@if ($alerta_proyectos)

<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
			<div class="box-header with-border">
				<i class="fa fa-warning"></i>
				<h3 class="box-title">Alertas</h3>
			</div>
			@foreach ($alerta_proyectos as $alerta)
			<div class="box-body">
				<div class="alert alert-danger alert-dismissible">
					<h4><i class="fa fa-warning"></i> El proyecto: <a href="{{ route('proyecto.editar', $alerta->id) }}"> {{ $alerta->nombre }}</a></h4>
						<h5>{{ $alerta->mensaje  }}</h5>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@endif
		<div class="row">
				<!-- *******  INICIO PROBADOS POR EL CFI ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-green'>
						<div class='inner'>
						  	<h2>{{ $p_aprobado_cfi }}<sup style='font-size: 20px'></sup></h2>
						  	<p>APROBADOS CFI</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'APROBADO CFI')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN PROBADOS POR EL CFI ******** -->

				<!-- *******  INICIO EFECTIVIZADOS ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-green'>
						<div class='inner'>
						  	<h2>{{ $p_cfi }}<sup style='font-size: 20px'></sup></h2>
						  	<p>EFECTIVIZADOS</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'EFECTIVIZADO')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN EFECTIVIZADOS ******** -->

				<!-- *******  INICIO EFECTIVIZADOS ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-green'>
						<div class='inner'>
						  	<h2>{{ $p_efec }}<sup style='font-size: 20px'></sup></h2>
						  	<p>EN EVALUACION CFI</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'CFI')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN EFECTIVIZADOS ******** -->
				<!-- *******  INICIO PROBADOS POR EL CFI ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-aqua'>
						<div class='inner'>
						  	<h2>{{ $p_en_uep }}<sup style='font-size: 20px'></sup></h2>
						  	<p>EN LA UNIDAD</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'UEP')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN PROBADOS POR EL CFI ******** -->
		</div>

		<div class="row">


				<!-- *******  INICIO EFECTIVIZADOS ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-aqua'>
						<div class='inner'>
						  	<h2>{{ $p_titular }}<sup style='font-size: 20px'></sup></h2>
						  	<p>EN TITULAR</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'EN TITULAR')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN EFECTIVIZADOS ******** -->

				<!-- *******  INICIO EFECTIVIZADOS ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-aqua'>
						<div class='inner'>
						  	<h2>{{ $p_bco }}<sup style='font-size: 20px'></sup></h2>
						  	<p>EN BANCO</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'BANCO')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN EFECTIVIZADOS ******** -->

				<!-- *******  INICIO PROBADOS POR EL CFI ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-green'>
						<div class='inner'>
						  	<h2>{{ $p_des }}<sup style='font-size: 20px'></sup></h2>
						  	<p>DESEMBOLSADOS</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'DESEMBOLSADO')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN PROBADOS POR EL CFI ******** -->

				<!-- *******  INICIO EFECTIVIZADOS ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-green'>
						<div class='inner'>
						  	<h2>{{ $p_judicial }}<sup style='font-size: 20px'></sup></h2>
						  	<p>EN GESTION JUDICIAL</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'GESTION JUDICIAL')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN EFECTIVIZADOS ******** -->
		</div>

		<div class="row">


				<!-- *******  INICIO EFECTIVIZADOS ******** -->
				<div class='col-lg-3 col-xs-6'>
					<div class='small-box bg-green'>
						<div class='inner'>
						  	<h2>{{ $p_cancelado }}<sup style='font-size: 20px'></sup></h2>
						  	<p>CANCELADO</p>
						</div>
						<div class='icon'>
						  	<i class='ion ion-stats-bars'></i>
						</div>
						<a href="{{ route('proyecto.filtrar', 'CANCELADO')  }}" class='small-box-footer'>
						  VER <i class='fa fa-arrow-circle-right'></i>
						</a>
					</div>
				</div>
				<!-- *******  FIN EFECTIVIZADOS ******** -->
		</div>


		
	</div>
@endsection
