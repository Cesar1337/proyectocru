@extends("crudbooster::admin_template")
@section("content")

<h1 class="text-center">Balance General</h1>
<h2 class="text-center">Balance Actual del Club: <strong class="text-success">{{$balance->balance_general}}</strong> BsF</h2>
<h2 class="text-center"></h2>
<h2 class="text-center">Ingresos hasta el dia de hoy: <strong class="text-success">{{$totalIngresosFecha}}</strong> BsF</h2>
<h2 class="text-center"></h2>
<h2 class="text-center">Gastos hasta el dia de hoy: <strong class="text-danger">{{$totalGastosFecha}}</strong> BsF</h2>
<h2 class="text-center"></h2>

@endsection