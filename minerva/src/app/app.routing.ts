//Imports Necesarios
import {ModuleWithProviders} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

//Importar componentes

import {LoginComponent} from './componentes/login/login.component';
import {ErrorComponent} from './componentes/error/error.component';

//definir rutas

const appRoutes: Routes = [
           {path:'', component:LoginComponent},
           {path: 'login', component: LoginComponent},
           {path: '**', component: ErrorComponent},

];

//exportar todo para que se tome por parte ANGULAR

export const appRoutingProviders: any []=[];
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);