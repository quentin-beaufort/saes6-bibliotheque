import { Adherent } from "./adherent";
import { Livre } from "./livre";

export class Reservation {
  constructor(
    public id: number,
    public dateResa: string,
    public adherent: Adherent,
    public livre: Livre,

  ) {
  }
}
