import { Component, OnInit } from '@angular/core';
import { Livre } from '../../../models/livre';
import { ApiService } from '../../../services/api.service';

@Component({
  selector: 'app-livres-list',
  templateUrl: './livres-list.component.html',
  styleUrl: './livres-list.component.css'
})
export class LivresListComponent
// implements OnInit
{
  // livres: Livre[] = [];

  livres = [{
    'id': 1,
    'titre': 'Beluga',
    'photoCouverture': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6fdf4CLjlvihE7K9Da-D0EHRXimf0Ioz86g',
    'date': '00-00-000'
  },
  {
    'id': 2,
    'titre': 'BelugaXL',
    'photoCouverture': 'https://img.20mn.fr/WrgtK5YNQmC9xS8Km_12AA/960x614_nouveau-beluga-xl-avionneur-airbus',
    'date': '00-00-000'
  },
  {
    'id': 3,
    'titre': 'BelugaXL',
    'photoCouverture': 'https://img.20mn.fr/WrgtK5YNQmC9xS8Km_12AA/960x614_nouveau-beluga-xl-avionneur-airbus',
    'date': '00-00-000'
  },
  {
    'id': 4,
    'titre': 'BelugaXL',
    'photoCouverture': 'https://img.20mn.fr/WrgtK5YNQmC9xS8Km_12AA/960x614_nouveau-beluga-xl-avionneur-airbus',
    'date': '00-00-000'
  },
  {
    'id': 1,
    'titre': 'Beluga',
    'photoCouverture': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6fdf4CLjlvihE7K9Da-D0EHRXimf0Ioz86g',
    'date': '00-00-000'
  },
  {
    'id': 2,
    'titre': 'BelugaXL',
    'photoCouverture': 'https://img.20mn.fr/WrgtK5YNQmC9xS8Km_12AA/960x614_nouveau-beluga-xl-avionneur-airbus',
    'date': '00-00-000'
  },
  {
    'id': 3,
    'titre': 'BelugaXL',
    'photoCouverture': 'https://img.20mn.fr/WrgtK5YNQmC9xS8Km_12AA/960x614_nouveau-beluga-xl-avionneur-airbus',
    'date': '00-00-000'
  },
  {
    'id': 4,
    'titre': 'BelugaXL',
    'photoCouverture': 'https://img.20mn.fr/WrgtK5YNQmC9xS8Km_12AA/960x614_nouveau-beluga-xl-avionneur-airbus',
    'date': '00-00-000'
  }

  ];
  //constructor(private apiService: ApiService){}

  //ngOnInit(): void{
  //  this.apiService.getLivres().subscribe((data:Livre[]) => { this.livres = data; });
  //}
}
