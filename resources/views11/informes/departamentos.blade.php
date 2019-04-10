<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>UEP-CFI</title>

		<style type="text/css">

		</style>
	</head>
	<body>
		
		<script src="{{ asset('code/highcharts.js') }}"></script>
		<script src="{{ asset('code/modules/exporting.js') }}"></script>
		<script src="{{ asset('code/modules/export-data.js') }}"></script>
	
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<script type="text/javascript">

				Highcharts.chart('container', {
				    chart: {
				        type: 'column'
				    },
				    title: {
				        text: 'Cantidad de Proyectos'
				    },
				    subtitle: {
				        text: 'según DEPARTAMENTOS'
				    },
				    xAxis: {

				        categories: [
				        @php
				        	foreach ($dptos as $key => $value) {
				        			if ($key == $cant - 1){
            								echo "'" . $value->nombre . "'";
    								}else{
            								echo "'" . trim($value->nombre) . "'" . ',';
    								}
    						}
				         @endphp
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
				        headerFormat: '<span style="font-size:12px"><b>{point.key}</b></span><table>',
				        pointFormat: '<tr><td style="color:{series.color};padding:0"> </td>' +
				            '<td style="padding:0"><b>{point.y} proyectos</b></td></tr>',
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
				        name: 'Sectores',
				        data: [
				        	@php
				        	foreach ($dptos as $key => $value) {
				        		if ($key == $cant - 1){
            								echo \App\Proyecto::where(['departamento_id' => $value->id])->count();
    								}else{
            								echo \App\Proyecto::where(['departamento_id' => $value->id])->count() . ',';
    								}
				        		

    						}
				         	@endphp
			        	]

				    }]
				});
		</script>
	</body>
</html>
