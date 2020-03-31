import { Component, OnInit } from '@angular/core';
import {NgForm} from '@angular/forms';
import { FormsModule } from '@angular/forms';
import {UsuarioService} from '../../servicios/usuario.service';
import {Usuario}  from '../../modelos/usuario';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
  providers: [UsuarioService],
})
export class LoginComponent implements OnInit {
	public titulo: string;
	public usuario:Usuario;
  public status:string;
  public token:string;
  public identity:string;
  constructor(
    private _usuarioService: UsuarioService
    ) { 
   this.titulo = 'Minerva Contable';
   this.usuario = new Usuario();

  }

  ngOnInit(){
  }

  onSubmit(form){
  this._usuarioService.signup(this.usuario).subscribe(
      response =>{
           //TOKEN
           if(response.status != 'error'){
            this.status ='success';
            this.token =response;
            console.log(this.token);
            localStorage.setItem('token',this.token);


            //OBJETO USUARIO IDENTIFICADO
             this._usuarioService.signup(this.usuario).subscribe(
      response =>{

              this.identity =response;
           
            console.log(this.identity);

            //persistir datos usuarios identificados
            localStorage.setItem('identity',JSON.stringify(this.identity));
            
         
           
        },
        error =>{
          this.status ='error';
          console.log(<any>error);
        }
    );

            
        }else{
          this.status = 'error';
        }
        },
        error =>{
          this.status ='error';
          console.log(<any>error);
        }
    );
  }

}
