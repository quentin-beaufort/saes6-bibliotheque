import { Component, OnInit } from '@angular/core';
import { Livre } from '../../../models/livre';
import { ApiService } from '../../../services/api.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-livres-list',
  templateUrl: './livres-list.component.html',
  styleUrl: './livres-list.component.css'
})
export class LivresListComponent implements OnInit{

  livres: Livre[] = [];
  triAscendant: boolean = true;
  search: string = '';

  constructor(private apiService: ApiService, private route: ActivatedRoute, private router: Router){}

  ngOnInit(): void{

    this.route.queryParams.subscribe(params => {
      this.search = params['search'];
    });
    if(this.search == null){
      this.apiService.getLivres().subscribe((data:Livre[]) => {
        this.livres = data;
        this.trierLivresParTitre();
      });
    }
    else{
      this.apiService.getLivresBySearch(this.search, '', '', '', '', '').subscribe((data:Livre[]) => {
        this.livres = data;
        this.trierLivresParTitre();
      });
    }
  }

  trierLivresParTitre(): void {
    if (this.triAscendant) {
      this.livres.sort((a, b) => a.titre.localeCompare(b.titre));
    } else {
      this.livres.sort((a, b) => b.titre.localeCompare(a.titre));
    }
  }

  changerOrdreTri(): void {
    this.triAscendant = !this.triAscendant;
    this.trierLivresParTitre();
  }
}
