<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\categorie;


class categoriefixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
 }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<30;$i++){
            $categorie = new categorie();
            $categorie->setnom($this->faker->lastName());  
            $this->addReference('categorie'.$i, $categorie);
            $manager->persist($categorie);
        }
        $manager->flush();
    }
}