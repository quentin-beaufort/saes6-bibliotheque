export class Adherent {
  constructor(
    public id: number,
    public date_adhesion: string,
    public nom: string,
    public prenom: string,
    public date_naiss: string,
    public email: string,
    public adresse_postale: string,
    public num_tel: string,
    public photo: string
  ) { }
}
