<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\bijou;
use App\Entity\categorie;


class bijoufixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
 }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<30;$i++){
            $bijou = new bijou();
            $bijou->setdescription($this->faker->text());
            $bijou->setprixvente($this->faker->randomNumber());  
            $bijou->setprixlocation($this->faker->randomNumber());
            $bijou->setidcategorie_id($this->getReference('categorie'));    
            $manager->persist($bijou);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [categorieFixtures::class];
    }
}