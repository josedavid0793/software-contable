<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    public function usuario(){

    	return $this->belongsTo('App\Usuario','tipo_documento');
    }
}
