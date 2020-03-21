<?php


namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\User;

class JwtAuth {

	public $key;

	public function __construct(){
		$this->key = 'Clave secreta $%&&&#&%$##';
	}

}
