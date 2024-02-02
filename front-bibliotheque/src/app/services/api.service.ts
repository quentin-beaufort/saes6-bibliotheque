import { Injectable } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Categorie } from '../models/categorie';
import { Livre } from '../models/livre';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  private apiUrl = 'http://127.0.0.1:8008/api'; // URL de notre API

  constructor(
    private http: HttpClient
  ) { }
  // Lister les catégories
  getLivres(): Observable<Livre[]> {
    return this.http.get<Livre[]>(`${this.apiUrl}/livre`);
  }

  gettroisLivres(): Observable<Livre[]> {
    return this.http.get<Livre[]>(`${this.apiUrl}/troislivre`);
  }

  getLivresBySearch(titre: string, auteur: string): Observable<Livre[]> {
    let params = new HttpParams();
    if (titre) {
      params = params.set('titre', titre);
    }
    if (auteur) {
      params = params.set('auteur', auteur);
    }

    // Utiliser les paramètres dans la requête
    return this.http.get<Livre[]>(`${this.apiUrl}/livre`, { params: params });
  }
}

