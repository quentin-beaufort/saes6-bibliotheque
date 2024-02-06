import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginFormComponent } from './shared/pages/login-form/login-form.component';
import { RegisterFormComponent } from './shared/pages/register-form/register-form.component';



const routes: Routes = [
  { path: 'login', component: LoginFormComponent },
  { path: 'inscription', component: RegisterFormComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
