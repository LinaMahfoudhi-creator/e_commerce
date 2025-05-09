<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Pays extends Fixture
{
    public function load(ObjectManager $manager): void
    {   $faker = \Faker\Factory::create('fr_FR');
        for($index = 1; $index <= 10; $index++) {

            $pays = new \App\Entity\Pays();
            $pays->setName($faker->country);

            $manager->persist($pays);
        }

        $manager->flush();
    }
}
