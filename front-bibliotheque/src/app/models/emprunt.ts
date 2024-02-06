import { Adherent } from "./adherent";
import { Livre } from "./livre";

export class Emprunt {
  constructor(
    public id: number,
    public dateRetour: string,
    public livre: Livre,
    public adherent: Adherent,

  ) {
  }
}
