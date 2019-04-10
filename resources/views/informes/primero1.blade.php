@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Informes
@endsection
@section('main-content')
@if(Session::has('message'))
    {{Session::get('message')}}
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
					
				
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			
		
		</div>
	</div>
</div>

@endsection
@push('scripts')
<script src="{{ asset('code/highcharts.js') }}"></script>
<script src="{{ asset('code/modules/exporting.js') }}"></script>
<script src="{{ asset('code/modules/export-data.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script type="text/javascript">
				Highcharts.chart('container', {
				    chart: {
				        type: 'column'
				    },
				    title: {
				        text: 'Cantidad de Proyectos'
				    },
				    subtitle: {
				        text: 'según su ESTADO'
				    },
				    xAxis: {
				        categories: [
				            'Aprobado CFI',
				            'EN UEP',
				            'Judicial',
				            'CFI',
				            'Cancelado',
				            'Archivado',
				            'Desembolso',
				            'Titular',
				            'Banco',
				            'Efectivizado'
				        ],
				        crosshair: true
				    },
				    yAxis: {
				        min: 0,
				        title: {
				            text: 'Cantidad de Proyectos'
				        }
				    },
				    tooltip: {
				        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
				        footerFormat: '</table>',
				        shared: true,
				        useHTML: true
				    },
				    plotOptions: {
				        column: {
				            pointPadding: 0.2,
				            borderWidth: 0
				        }
				    },
				    series: [{
				        name: 'Estados',
				        data: [
				        	{{ $p_aprobado_cfi }}, 
				        	{{ $p_en_uep }}, 
				        	{{ $p_judicial }}, 
				        	{{ $p_cfi }}, 
				        	{{ $p_cancelado }}, 
				        	{{ $p_archivado }}, 
				        	{{ $p_des }}, 
				        	{{ $p_titular }}, 
				        	{{ $p_bco }}, 
				        	{{ $p_efec }}
			        	]

				    }]
				});
		</script>
@endpush
