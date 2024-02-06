
import { ApiService } from '../../../services/api.service';
import { Component, OnInit } from '@angular/core';
import { Livre } from '../../../models/livre';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  livres: Livre[] = [];
  showDropdown = false;

  constructor(private apiService: ApiService) { }

  ngOnInit(): void {
    this.apiService.gettroisLivres().subscribe(livres => {
      this.livres = livres;
    });
  }

}
