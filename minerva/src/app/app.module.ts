import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {routing, appRoutingProviders} from './app.routing';
import {ModuleWithProviders} from '@angular/core';
import {FormsModule} from '@angular/forms';
import {HttpClientModule} from '@angular/common/http';




//componentes creados
import { AppComponent } from './app.component';
import { LoginComponent } from './componentes/login/login.component';
import { ErrorComponent } from './componentes/error/error.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    ErrorComponent,

  ],
  imports: [
    BrowserModule,
    routing,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
  ],
  providers: [
    appRoutingProviders,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
