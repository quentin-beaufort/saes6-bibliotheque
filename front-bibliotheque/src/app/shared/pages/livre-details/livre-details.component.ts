import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-livre-details',
  templateUrl: './livre-details.component.html',
  styleUrls: ['./livre-details.component.css']
})
export class LivreDetailsComponent {
  id: string = '';
  constructor(private route: ActivatedRoute) { }
  ngOnInit() {
    this.route.params.subscribe(params => {
      this.id = params['id']
      this.loadDataById(this.id);
    });
  }
  loadDataById(id: string) {
    // charger les données en fonction de l'ID
  }
}

