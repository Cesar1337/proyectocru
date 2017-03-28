<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonos_Mensualidades extends Model
{
    public $table = 'abonos_mensualidades';

    public function miembro()
    {
        return $this->belongsTo('App\Miembro');
    }
}
