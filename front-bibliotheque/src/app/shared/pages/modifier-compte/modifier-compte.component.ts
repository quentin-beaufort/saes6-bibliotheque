import { Component } from '@angular/core';
import { Adherent } from '../../../models/adherent';
@Component({
  selector: 'app-modifier-compte',
  templateUrl: './modifier-compte.component.html',
  styleUrl: './modifier-compte.component.css'
})
export class ModifierCompteComponent {
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
  };

  onSubmit() {
    // Logique à exécuter lors de la soumission du formulaire
    console.log('Formulaire soumis avec les nouvelles valeurs :', this.adherent);
  }
}
