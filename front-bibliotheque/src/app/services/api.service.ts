import { Injectable } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Categorie } from '../models/categorie';
import { Livre } from '../models/livre';
import { Adherent } from '../models/adherent';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  private apiUrl = 'http://127.0.0.1:8008/api'; // URL de notre API

  constructor(
    private http: HttpClient
  ) { }

  getAuthors(): Observable<string[]> {
    return this.http.get<string[]>(`${this.apiUrl}/authors`);
  }

  getLivres(): Observable<Livre[]> {
    return this.http.get<Livre[]>(`${this.apiUrl}/livres`);
  }

  getAdherentId(id: number): Observable<Adherent[]> {
    return this.http.get<Adherent[]>(`${this.apiUrl}/adherents/${id}`);
  }

  gettroisLivres(): Observable<Livre[]> {
    return this.http.get<Livre[]>(`${this.apiUrl}/troislivre`);
  }

  getCategories(): Observable<Categorie[]> {
    return this.http.get<Categorie[]>(`${this.apiUrl}/categories`);
  }

  getLivreId(id: number): Observable<Livre> {
    return this.http.get<Livre>(`${this.apiUrl}/livre/${id}`);
  }

  getLivresBySearch(searchwords: string, language: string, category: string, author: string, minYear: string, maxYear: string): Observable<Livre[]> {
    let params = new HttpParams();
    if (searchwords) {
      params = params.set('searchwords', searchwords);
    }
    if (language) {
      params = params.set('language', language);
    }
    if (category) {
      params = params.set('category', category);
    }
    if (author) {
      params = params.set('author', author);
    }
    if (minYear) {
      params = params.set('minYear', minYear);
    }
    if (maxYear) {
      params = params.set('maxYear', maxYear);
    }

    // Utiliser les paramètres dans la requête
    return this.http.get<Livre[]>(`${this.apiUrl}/search`, { params: params });
  }
}

