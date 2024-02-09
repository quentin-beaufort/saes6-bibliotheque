
import { ApiService } from '../../../services/api.service';
import { Component, OnInit } from '@angular/core';
import { Livre } from '../../../models/livre';
import { Router } from '@angular/router';
import { AuthService } from '../../../services/auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent {

  constructor(private apiService: ApiService, public authService: AuthService,
    private router: Router) { }





  onSubmit(formValue: any) {
    const queryParams = {
      search: formValue.search
    };

    this.router.navigate(['/livres'], { queryParams: queryParams });
  }
}
