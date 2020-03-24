import {Injectable} from '@angular/core';
import {HttpClient,HttpHeaders} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Usuario} from '../modelos/usuario';

@Injectable()

export class UsuarioService{

	constructor(
       public _http:HttpClient
		)
	{}
}