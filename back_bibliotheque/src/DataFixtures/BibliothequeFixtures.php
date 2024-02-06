<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Categorie;
use App\Entity\Adherent;
use App\Entity\Emprunt;
use App\Entity\Reservation;

class BibliothequeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        //Création de 50 auteurs
        $auteurs = [];
        for ($i = 0; $i < 50; $i++) {
            $auteur = new Auteur();

            $auteur->setNom($faker->lastName());
            $auteur->setPrenom($faker->firstName());
            $auteur->setDateNaissance($faker->dateTimeBetween('-100 years', '-20 years'));
            $auteur->setDateDeces($faker->dateTimeBetween('-20 years', 'now'));
            $auteur->setNationalite($faker->country());
            $auteur->setPhoto($faker->imageUrl(512, 512, $faker->word()));
            $auteur->setDescription($faker->text(512));

            $auteurs[] = $auteur;

            $manager->persist($auteur);
            $manager->flush();
        }

        // Création de 10 catégories
        $categories = [];
        for ($i = 0; $i < 10; $i++) {
            $categorie = new Categorie();

            $categorie->setNom($faker->words(3, true));
            $categorie->setDescription($faker->text(512));

            $categories[] = $categorie;

            $manager->persist($categorie);
            $manager->flush();
        }
        



        // Création de 500 livres
        $livres = [];
        for ($i = 0; $i < 500; $i++) {
            $livre = new Livre();

            $livre->setTitre($faker->words(3, true));
            $livre->setDateSortie($faker->dateTimeBetween('-50 years', 'now'));
            $livre->setLangue($faker->languageCode);
            $livre->setPhotoCouverture($faker->imageUrl(345, 500, $faker->word()));
            // Ajout de 1 ou 2 auteurs au hasard
            $auteursLivre = $faker->randomElements($auteurs, $faker->numberBetween(1, 2));
            foreach ($auteursLivre as $auteur) {
                $livre->addAuteur($auteur);
            }
            // Ajout de 1 à 3 catégories au hasard
            $categoriesLivre = $faker->randomElements($categories, $faker->numberBetween(1, 3));
            foreach ($categoriesLivre as $categorie) {
                $livre->addCategory($categorie);
            }

            $livres[] = $livre;

            $manager->persist($livre);
            $manager->flush();
        }

        // Création de 100 adhérents
        $adherents = [];
        for ($i = 0; $i < 100; $i++) {
            $adherent = new Adherent();

            $adherent->setNom($faker->lastName());
            $adherent->setPrenom($faker->firstName());
            $adherent->setDateNaiss($faker->dateTimeBetween('-80 years', '-20 years'));
            $adherent->setDateAdhesion($faker->dateTimeBetween('-10 years', 'now'));
            $adherent->setAdressePostale($faker->address());
            $adherent->setEmail($faker->email());
            $adherent->setNumTel($faker->phoneNumber());
            $adherent->setPhoto($faker->imageUrl(512, 512, $faker->word()));
            $adherent->setPassword($faker->password());

            $adherents[] = $adherent;

            $manager->persist($adherent);
            $manager->flush();
        }

        /*
        // Création de 100 emprunts
        for ($i = 0; $i < 100; $i++) {
            $emprunt = new Emprunt();

            $emprunt->setDateEmprunt($faker->dateTimeBetween('-10 years', 'now'));
            $emprunt->setDateRetour($faker->dateTimeBetween('now', '+10 years'));
            $adh = $faker->randomElement($adherents);
            $emprunt->setAdherent($adh);
            $livre = $faker->randomElement($livres);
            $emprunt->setLivre($livre);

            // On enleve le livre de la liste des livres pour qu'il ne soit pas emprunté
            $livres = array_diff($livres, array($livre));

            $adherents = array_diff($adherents, array($adh));

            $manager->persist($emprunt);
            $manager->flush();
        }

        // Création de 100 réservations
        for ($i = 0; $i < 100; $i++) {
            $reservation = new Reservation();

            $reservation->setDateResa($faker->dateTimeBetween('-7 days', 'now'));
            $adherent = $faker->randomElement($adherents);
            $reservation->setAdherent($adherent);
            $livre = $faker->randomElement($livres);
            $reservation->setLivre($livre);

            // On enleve le livre de la liste des livres pour qu'il ne soit pas réservé
            $livres = array_diff($livres, array($livre));

            $adherents = array_diff($adherents, array($adherent));

            $manager->persist($reservation);
            $manager->flush();
        }
        */
    }
}
