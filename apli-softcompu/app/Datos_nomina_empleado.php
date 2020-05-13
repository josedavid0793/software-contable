<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos_nomina_empleado extends Model
{
    

    protected $fillable = [
        'identificacion', 'nombres_empleado','apellidos_empleado','salario_base','subsidio_transporte','dias_trabajados','hora_extra_diurna','hora_extra_nocturna','hora_extra_diurna_dominical_festivo','hora_extra_nocturno_dominical_festivo','hora_dominical_festivo_nocturna','recargo_nocturno','recargo_dominical_festivo','comisiones','bonificaciones','total_devengado','IBC','fondo_empleados','prestamos','descuentos_salud','descuentos_pension','total_descuentos','cesantias','prima','vacaciones','intereses_cesantias','sueldo',
    ];
}
