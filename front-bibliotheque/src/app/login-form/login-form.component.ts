
import { Component } from '@angular/core';

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

  onSubmit() {
    
    console.log('Formulaire soumis !', this.user);
  }
}