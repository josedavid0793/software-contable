import { Component, OnInit } from '@angular/core';
import {UserService} from '../../servicios/usuario.service';
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
  constructor() { 
   this.titulo = 'Minerva Contable';
   this.usuario = new Usuario(1,'','','ROLE_USER','','','','');

  }

  ngOnInit(): void {
  }

}
