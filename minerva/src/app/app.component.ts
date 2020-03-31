import { Component } from '@angular/core';
import { UsuarioService } from './servicios/usuario.service';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers: [UsuarioService],
})
export class AppComponent {
  titulo = 'minerva';

    public identity;
  public token;

  constructor(
     public _usuarioService: UsuarioService
  	){
     this.identity = this._usuarioService.getIdentity();
  }
}
