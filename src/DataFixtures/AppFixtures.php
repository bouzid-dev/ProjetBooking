<?php

namespace App\DataFixtures;

use App\Entity\Salle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $types = ['reunion', 'conf'];
        //Créer 3 salles fakées

        for ($i = 0; $i < 20; $i++) {
            $salle = new Salle();
            $salle->setNomSalle($faker->word);
            $salle->setAdresse($faker->address);
            $salle->setPrix(mt_rand(1000, 5000));
            $salle->setNbPlaces(mt_rand(10, 100));
            $salle->setType($types[mt_rand(0, count($types) - 1)]);
            $manager->persist($salle);
        }

        $manager->flush();

    }
}
