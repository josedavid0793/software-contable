//Imports Necesarios
import {ModuleWithProviders} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

//Importar componentes
import {HomeComponent} from './componentes/home/home.component';
import {LoginComponent} from './componentes/login/login.component';
import {RegisterComponent} from './componentes/register/register.component';
import {ErrorComponent} from './componentes/error/error.component';

//definir rutas

const appRoutes: Routes = [
           {path:'', component:LoginComponent},
           {path:'inicio', component:HomeComponent},
           {path: 'login', component: LoginComponent},
           {path: 'registro', component: RegisterComponent},
           {path: '**', component: ErrorComponent},

];

//exportar todo para que se tome por parte ANGULAR

export const appRoutingProviders: any []=[];
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);