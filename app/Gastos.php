<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Gastos extends Model
{
    protected $dates = [
        'fecha_de_realizacion'
    ];

    public function getFechaDeRealizacionAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
