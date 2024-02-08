
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../../../services/auth.service';



@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.css']
})
export class LoginFormComponent {
  user = {
    email: '',
    password: ''
  };

  constructor(private authService: AuthService, private router: Router) { }

  onSubmit() {

    this.authService.login(this.user.email, this.user.password)
      .subscribe({
        next: data => {
          this.router.navigate(['/']);
        },
        error: err => {
          console.error('Erreur lors de la connexion', err);
        }
      });
  }

  redirectToRegistration() {

    this.router.navigate(['/inscription']);
  }
}
