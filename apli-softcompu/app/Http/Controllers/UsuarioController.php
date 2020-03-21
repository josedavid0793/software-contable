<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Usuario;


class Usuario extends Controller
{
    public function login(Request $request){
      
      $jwtAuth = new \JwtAuth();

      //Recibir datos por post
      $json =$request->input('json',null);
      $params = json_decode($json);
      $params_array=json_decode($json,true);

      //Validar datos
      $validate = Validator::make($request = $params_array, [
             'usuario'        =>'required',
             'contraseña'     => 'required',

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

        //Devolver token o datos

        $signup = $jwtAuth->signup($params->email,$pwd);
        if(!empty($params->getToken)){

          $signup = $jwtAuth->signup($params->email,$pwd,true);
        }
      }


      return response()->json($signup,200);

    }

    //Metodo para actualizar datos del usuario por medio del metodo checkToken de JwtAuth.php

    }
}
