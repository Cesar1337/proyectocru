<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Relacion_ingresos_gastos extends Model
{
    protected $dates = [
        'fecha_inicio',
        'fecha_cierre'
    ];

    public function getFechaInicioAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getFechaCierreAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
