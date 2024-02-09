import { Component } from '@angular/core';
import { Adherent } from '../../../models/adherent';
import { ApiService } from '../../../services/api.service';
import { AuthService } from '../../../services/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-adherent-profile',
  templateUrl: './adherent-profile.component.html',
  styleUrl: './adherent-profile.component.css'

})
export class AdherentProfileComponent {
  constructor(private apiService: ApiService, public authService: AuthService,
    private router: Router) { }
  logout() {
    this.authService.logout();
    this.router.navigateByUrl('/login');
  }
  adherent: Adherent = {
    'id': 1,
    'date_adhesion': '01/01/2009',
    'nom': 'Douville',
    'prenom': 'Leo',
    'date_naiss': '01/08/2003',
    'email': 'leodvldvl@gmail.com',
    'adresse_postale': '31',
    'num_tel': '07 84 68 65 45',
    'photo': 'https://www.nosorigines.qc.ca/genealogyImages/042036_934552_Douville_Leo.jpg'

  }

}
