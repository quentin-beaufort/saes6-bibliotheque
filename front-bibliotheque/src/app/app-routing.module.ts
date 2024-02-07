import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginFormComponent } from './shared/pages/login-form/login-form.component';
import { RegisterFormComponent } from './shared/pages/register-form/register-form.component';
import { LivresListComponent } from './shared/pages/livres-list/livres-list.component';
import { LivreDetailsComponent } from './shared/pages/livre-details/livre-details.component';
import { AdherentProfileComponent } from './shared/pages/adherent-profile/adherent-profile.component';



const routes: Routes = [
  { path: '', component: LivresListComponent },
  { path: 'login', component: LoginFormComponent },
  { path: 'inscription', component: RegisterFormComponent },
  { path: 'livres', component: LivresListComponent },
  { path: 'details/:id', component: LivreDetailsComponent },
  { path: 'compte', component: AdherentProfileComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
