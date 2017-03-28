<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    public $table = 'cms_users';

    public function mensualidades(){
    	return $this->hasMany('App\Abonos_Mensualidades');
    }

    
}
