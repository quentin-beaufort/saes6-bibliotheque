import { Livre } from "./livre";
export class Auteur {
  constructor(
    public id: number,
    public nom: string,
    public prenom: string,
    public dateNaissance: string,
    public dateDeces: string,
    public nationalite: string,
    public photo: string,
    public desctiption: string,
    public livres: Livre
  ) { }
}
