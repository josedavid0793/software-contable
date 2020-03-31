<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    public function usuario(){

    	return $this->belongsTo('App\Usuario','roles');
    }
}
