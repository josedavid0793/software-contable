<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    public function usuario(){

    	return $this->hasMany('App\Usuario','tipo_documento');
    }
}
