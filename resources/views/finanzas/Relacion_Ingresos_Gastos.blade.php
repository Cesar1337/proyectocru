@extends("crudbooster::admin_template")
@section("content")
    <h1 class="text-center">Relacion de Ingresos y Gastos</h1>
    <h2 class="text-center">Desde {{$relacion->fecha_inicio}} hasta {{$relacion->fecha_cierre}}</h2>

	
	<div class="row">
		<h3 class="text-center">Ingresos:</h3>
		<div class="col-md-10 col-md-offset-1">
			<h4><strong>Donaciones:</strong></h4>
			@if($donaciones->count() > 0)	
				<table class="table table-striped">
					<th>Motivo</th>
					<th>Monto</th>
					<th>Fecha de realizacion </th>
				    @foreach($donaciones as $donacion)
				    	<tr>
					    	<td>{{$donacion->descripcion}}</td>
							<td>{{$donacion->monto}}</td>
							<td>{{$donacion->fecha_de_realizacion}}</td>
						</tr>
				    @endforeach
		   	 	</table>
		   	<h4>Total Donaciones: <strong class="text-success">{{$totalDonaciones}}</strong></h4></div>
		   	@else
		   		<h4>No se efectuaron donaciones en este rango de tiempo</h4>
		   	@endif
	</div>   	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h4><strong>Mensualidades:</strong></h4>
			<table class="table responsive table-striped">
				<th>Miembro</th>
				<th>Monto</th>
				<th>Fecha de realizacion </th>
	   	 	</table>
	   	<h4>Total Mensualidades: <strong class="text-success">TODO_MENSUALIDADES</strong></h4>
	   	<h4>Total Ingresos: <strong class="text-success">TODO_TOTAL_INGRESOS</strong></h4>	
		</div>
	</div>	

	

	<div class="row">
		<h3 class="text-center">Gastos:</h3>
		<div class="col-md-10 col-md-offset-1">
			<table class="table responsive table-striped">
				<th>Motivo</th>
				<th>Monto</th>
				<th>Fecha de realizacion </th>
			    @foreach($gastos as $gasto)
			    	<tr>
				    	<td>{{$gasto->descripcion}}</td>
						<td>{{$gasto->monto}}</td>
						<td>{{$gasto->fecha_de_realizacion}}</td>
					</tr>
			    @endforeach
	   	 	</table>
	   	<h4>Total Gastos: <strong class="text-danger">{{$totalGastos}}</strong></h4>	
		</div>
	</div>	

	<h3 class="text-center">Beneficio neto para este rango de tiempo: @if($totalNeto > 0)<strong class="text-success">@else<strong class="text-danger">@endif{{$totalNeto}}</strong> BsF</h3>
	<h3 class="text-center">Balance general para este rango de tiempo: TODO BsF</h3>


	

@endsection