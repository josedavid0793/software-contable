<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Usuario;


class UsuarioController extends Controller
{

    public function register(Request $request){
     //recoger datos del usuario por post
     $json = $request->input('json', null);
     //Decodificar el JSON
     $params = json_decode($json);//Objeto
     $params_array = json_decode($json,true);//array
     //var_dump($params_array); die(); //codigo para validar la captura de datos
     if(!empty($params) && !empty($params_array)){
     
     //Limpiar datos
     $params_array = array_map('trim', $params_array);
     
     //validar datos
     $validate = \Validator::make($params_array,[
         'usuario'     =>'required|alpha',
         'nombres'     => 'required|regex:/^[\pL\s\-]+$/u',
         'apellidos'   => 'required|regex:/^[\pL\s\-]+$/u',
         'correo'      => 'required|email|unique:usuarios',//unique comprueba si existe el usuario
         'password'   => 'required',
         'rol'         =>'required',
     ]);
     
     if($validate->fails()){
         //La validación ha fallado
     $data = array (
         'status'     => 'error',
         'code'       => 404,
         'message'    => 'El Usuario no se a creado',
         'errors'     => $validate->errors(),
          );
     }else{
         //Validación pasada correctamente
         
      //Cifrar la contraseña
    $pwd = hash('sha256',$params->password);

     //crear el usuario
    $usuario = new Usuario();
    $usuario->usuario = $params_array['usuario'];
    $usuario->nombres = $params_array['nombres'];
    $usuario->apellidos = $params_array['apellidos'];
    $usuario->correo = $params_array['correo'];
    $usuario->password = $pwd;
    $usuario->rol = $params_array['rol'];
    
       //Guardar el usuario en base de datos
    $usuario->save();
    
       $data = array (
         'status'     => 'success',
         'code'       => 200,
         'message'    => 'El Usuario se a creado correctamente',
           );
     }
     } else {
        $data = array (
         'status'     => 'error',
         'code'       => 404,
         'message'    => 'Los datos enviados no son correctos',

          );
     }
     

     
     
     


     //el JSON convierte el array en datos JSON
    return response()->json($data,$data['code']);
 }




    public function login(Request $request){
      
      $jwtAuth = new \JwtAuth();

      //Recibir datos por post
      $json =$request->input('json',null);
      $params = json_decode($json);
      $params_array=json_decode($json,true);

      //Validar datos
      $validate = Validator::make($request = $params_array, [
             'usuario'        =>'required',
             'password'     => 'required',

         ]);
      if($validate->fails()){

        $signup = array(
        'status' => 'error',
        'code'   => 404,
        'message'=>'El usuario no se ha podido loguear',
          'errors' => $validate->errors(),
      );

      }else{

        //Cifrar la password
      $pwd = hash('sha256',$params->password);
       //$pwd = $params->password;

        //Devolver token o datos

        $signup = $jwtAuth->signup($params->usuario,$pwd);
        if(!empty($params->getToken)){

          $signup = $jwtAuth->signup($params->usuario,$pwd,true);
        }
      }


      return response()->json($signup,200);

    }

    //Metodo para actualizar datos del usuario por medio del metodo checkToken de JwtAuth.php

    //}
}
