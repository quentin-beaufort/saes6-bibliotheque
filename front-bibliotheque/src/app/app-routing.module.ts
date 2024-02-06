import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginFormComponent } from './shared/pages/login-form/login-form.component';
import { RegisterFormComponent } from './shared/pages/register-form/register-form.component';
import { LivresListComponent } from './shared/pages/livres-list/livres-list.component';
import { LivreDetailsComponent } from './shared/pages/livre-details/livre-details.component';



const routes: Routes = [
  { path: 'login', component: LoginFormComponent },
  { path: 'inscription', component: RegisterFormComponent },
  { path: 'livres', component: LivresListComponent },
  { path: 'details/:id', component: LivreDetailsComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
