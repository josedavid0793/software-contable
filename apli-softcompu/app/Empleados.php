<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
   public function TipoDocumentos(){
        return $this->hasMany('App\TipoDocumento');
    }

   public function cargos(){
   	return $this->hasMany('App\Cargos')
   }
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identificacion', 'Tipo_documento','nombres','apellidos','id_cargo_empleado','cargo_empleado','salario_empleado','correo','fecha_ingreso','fecha_retiro',
    ];

    public $timestamps = false;
}
