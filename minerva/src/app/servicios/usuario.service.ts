import {Injectable} from '@angular/core';
import {HttpClient,HttpHeaders} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Usuario} from '../modelos/usuario';
import {global} from './global';

@Injectable()

export class UsuarioService{
  	public url:string;
    public identity;
    public token;
	constructor(
       public _http: HttpClient
		)
	{
		this.url = global.url;
	}

	signup(usuario,getToken=null):Observable<any>{
			
		if(getToken !=null){
          usuario.getToken = 'true';
		}
		let json    =JSON.stringify(usuario);
		let params  ='json='+json;
		let headers = new HttpHeaders().set('Content-Type','application/x-www-form-urlencoded');

		return this._http.post(this.url+'login',params,{headers:headers});
	}

	getIdentity(){
     let identity =JSON.parse(localStorage.getItem('identity'));

     if(identity && identity != "undefined"){
      this.identity = identity;
     }else{
      this.identity = null;
     }
     return this.identity;
  }

  getToken(){
     let token = localStorage.getItem('token');

     if(token && token != "undefined"){
      this.token = token;
     }else{
      this.token = null;
     }
     return this.token;
  }
}