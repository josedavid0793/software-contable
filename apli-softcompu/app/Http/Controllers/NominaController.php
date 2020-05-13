<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Datos_nomina_empleado;

class NominaController extends Controller
{
    public function devengados(Request $request){
          $json = $request->input('json',null);
          $params = json_decode($json);
          $params_array =json_decode($json,true);

          if(!empty($params) && !empty($params_array)){
              
              $params_array = array_map('trim', $params_array);

              

              $validate =Validator()make::$params_array,([
                'identificacion'                       =>
                'nombres_empleado'                     =>
                'apellidos_empleado'                   =>
                'salario_base'                         =>
                'subsidio_transporte'                  =>
                'dias_trabajados'                      =>
                'hora_extra_diurna'                    =>
                'hora_extra_nocturna'                  =>
                'hora_extra_diurna_dominical_festivo'  =>
                'hora_extra_nocturno_dominical_festivo'=>
                'hora_dominical_festivo_nocturna'      =>
                'recargo_nocturno'                     =>
                'recargo_dominical_festivo'            =>
                'comisiones'                           =>
                'bonificaciones'                       =>
                'total_devengado'                      =>
                'IBC'                                  =>
                'fondo_empleados'                      =>
                'prestamos'                            =>
                'descuentos_salud'                     =>
                'descuentos_pension'                   =>
                'total_descuentos'                     =>
                'cesantias'                            =>
                'prima'                                =>
                'vacaciones'                           =>
                'intereses_cesantias'                  =>
                'sueldo'                               =>

              ]);


          }


    }
}
