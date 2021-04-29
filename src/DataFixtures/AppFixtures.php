<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Flight;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

/**
 * Création d'un Flight requière entre autres :
 *  l'attribution d'un numéro composé de 2 lettres et 4 chiffres
 *  la relation avec un objet de type City pour departure et arrival
 */

class AppFixtures extends Fixture
{


    /**
     * Permet d'alimenter la base de données avec
     * - 7 enregistrements de villes
     * - 1 enregistrement de vol
     *
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        /** ----------------------------------------------------
         * Tableau d'objets de type City pour toutes Les villes 
         * --------------------------------------------------- */

        $cities =  ['Londres', 'Paris', 'Berlin', 'Lisbonne', 'Madrid', 'Bruxelles', 'Rome'];
        // Tableau d'objets de type City
        $tabObjCity = [];
        // -- Crée autant d'objet City que de villes dans $cities
        foreach ($cities as $name) {
            $city =  new City();
            $city->setName($name);
            $tabObjCity[] = $city;
            $manager->persist($city);
        }

        /** -----------------------------------------------------------
         * UN VOL 
         * ------------------------------------------------------------- */

        $flight =  new Flight();
        $flight
            ->setNumero('AA1111')
            ->setSchedule(\DateTime::createFromFormat('H:i', '08:00'))
            ->setPrice(210)
            ->setReduction(false)
            ->setDeparture($tabObjCity[0])
            ->setArrival($tabObjCity[4]);
        $manager->persist($flight);


        $manager->flush();

    }
}
