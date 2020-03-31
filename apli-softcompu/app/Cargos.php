<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    public function empleados(){
    	return $this->belongsTo('App\Empleados','cargos');
    }
}
