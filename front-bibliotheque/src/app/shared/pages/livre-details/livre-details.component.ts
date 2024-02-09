

import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ApiService } from '../../../services/api.service';
import { Livre } from '../../../models/livre';


@Component({
  selector: 'app-livre-details',
  templateUrl: './livre-details.component.html',
  styleUrls: ['./livre-details.component.css']
})
export class LivreDetailsComponent implements OnInit{
  id!: number;
  livre!: Livre;


  constructor(private route: ActivatedRoute, private apiService: ApiService) {}

  ngOnInit() {
    this.route.params.subscribe(params => {
      this.id = params['id'];
      this.loadDataById(this.id);
    });
  }

  loadDataById(id: number) {
    this.apiService.getLivresId(id).subscribe((data: Livre) => {
      this.livre = data;
      console.log(this.id);
      console.log(this.livre);

    });
  }
}



