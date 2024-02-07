
import { Component } from '@angular/core';
import { Router } from '@angular/router';

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

  constructor(private router: Router) { }

  onSubmit() {
    
    console.log('Formulaire soumis !', this.user);
  }

  redirectToRegistration() {
    
    this.router.navigate(['/inscription']);
  }
}