import { Component, OnInit } from '@angular/core';
import {Usuario} from '../../modelos/usuario';

@Component({
  selector: 'register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
     public titulo: string;
     public usuario: Usuario;

  constructor() {
     this.titulo  ="Registro de usuario";
     this.usuario = new Usuario(1,'','','','','','Estándar');
   }

  ngOnInit(): void {
    console.log('Componente de registro');


  }

  onSubmit(registerForm){
    console.log(this.usuario);
  }

}
