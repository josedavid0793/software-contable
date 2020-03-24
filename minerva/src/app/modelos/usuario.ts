export class usuarios{
	constructor(
       public id_usuario: number,
       public usuario   : string,
       public nombres   : string,
       public apellidos : string,
       public documento : number,
       public tipo_documento: string,
       public correo    : string,
       public contraseña: string,
       public rol       : string,

		){

	}


}