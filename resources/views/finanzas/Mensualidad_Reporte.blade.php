@extends("crudbooster::admin_template")
@section("content")
	<h1 class="text-center">Registro de mensualidades</h1>
	<h2 class="text-center">{{$mes}} del año {{$anio}}</h2>
	
	<div class="col-sm-8 col-sm-offset-2" style="margin-top:30px;">
		<table class="table table-striped">
			<th class="text-center">Miembro</th>
			<th class="text-center">¿Pago el mes?</th>
			@foreach($miembros as $miembro)
				<tr class="text-center">
					<td>{{$miembro->name}}</td>
					@foreach($pagosRealizados as $pago)
						@php $encontrado = false @endphp
						@if($pago->miembro->id === $miembro->id)
							<td><img src="{{ asset('/images/check.png') }}"></td>
							@php $encontrado = true; @endphp
							@break
						@endif	
					@endforeach	
					@if(!$encontrado)
						<td><img src="{{ asset('/images/x.png') }}"></td>
					@endif
				</tr>
			@endforeach
		</table>
	</div>

@endsection