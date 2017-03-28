@extends("crudbooster::admin_template")
@section("content")
	<div class="panel panel-default">
		<div class="panel-heading" style="font-size:30px;">
			Mensualidad Actual: <strong>{{$mensualidad->mensualidad_actual}} bsF</strong>
		</div>
		<form action="{{CRUDBooster::mainpath('add-save')}}" method="POST">	
			{{ csrf_field() }}
			<div class="panel-body">
				@if($errors->any())
					<span class="text-danger text-center"><h3>{{$errors->first()}}</h3></span>
				@endif
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-2 text-right">Miembro que pago:</label>
						<div class="col-sm-10">
							<select class="form-control" name="miembro_id">
								@foreach($miembros as $miembro)
									<option value="{{$miembro->id}}">{{$miembro->name}}</option>
								@endforeach
							</select>
						</div>
					</div>	
				</div>

				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-2 text-right">Mes Correspondiente:</label>
						<div class="col-sm-10">
							<select class="form-control" name="mes_correspondiente">
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
						<label class="control-label col-sm-2 text-right">Año Correspondiente:</label>
						<div class="col-sm-10">
							<select class="form-control" name="anio_correspondiente">
							@for($i = 2017; $i < 2051; $i++)
								<option value="{{$i}}">{{$i}}</option>
							@endfor	
							</select>
						</div>
					</div>	
				</div>

				
				<input type="hidden" name="monto_abonado" value="{{$mensualidad->mensualidad_actual}}">
			</div>
			<div class="panel-footer">
				<input type="submit" name="submit" value='Save &amp; Add More' class='btn btn-success col-sm-offset-2'>
                                 
                <input type="submit" name="submit" value='Save' class='btn btn-success'>
			</div>
		</form>
	</div>

	
	</script>
@endsection