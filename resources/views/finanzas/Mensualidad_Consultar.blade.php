@extends("crudbooster::admin_template")
@section("content")
	<div class="panel panel-default">
		<div class="panel-heading">
			Consultar registro de mensualidades:
		</div>
		<form action="/mensualidad_reporte" method="GET">	
			{{ csrf_field() }}
			<div class="panel-body">
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-2 text-right">Mes a revisar:</label>
						<div class="col-sm-10">
							<select class="form-control" name="mes">
								<option value="Enero">Enero</option>
								<option value="Febrero">Febrero</option>
								<option value="Marzo">Marzo</option>
								<option value="Abril">Abril</option>
								<option value="Mayo">Mayo</option>
								<option value="Junio">Junio</option>
								<option value="Julio">Julio</option>
								<option value="Agosto">Agosto</option>
								<option value="Septiembre">Septiembre</option>
								<option value="Octubre">Octubre</option>
								<option value="Noviembre">Noviembre</option>
								<option value="Diciembre">Diciembre</option>
							</select>
						</div>
					</div>	
				</div>

				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-2 text-right">Año a consultar:</label>
						<div class="col-sm-10">
							<select class="form-control" name="anio">
							@for($i = 2017; $i < 2051; $i++)
								<option value="{{$i}}">{{$i}}</option>
							@endfor	
							</select>
						</div>
					</div>	
				</div>
			</div>
			<div class="panel-footer">
				<input type="submit" class="btn btn-success col-sm-offset-2" value="Consultar">
			</div>
		</form>
	</div>
@endsection