import { Auteur } from "./auteur";
import { Categorie } from "./categorie";
import { Emprunt } from "./emprunt";
import { Reservation } from "./reservation";
export class Livre {
  constructor(
    public id: number,
    public titre: string,
    public dateSortie: string,
    public langue: string,
    public photoCouverture: string,
    public auteurs: Array<Auteur>,
    public categories: Array<Categorie>,
    public emprunts: Array<Emprunt>,
    public reservation: Reservation
  ) { }
}
