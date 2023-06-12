<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use function Symfony\Component\Clock\now;

class AppFixtures extends Fixture
{


    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);


        for ($i = 1; $i <= 50; $i++) {
            $ingradient = new Ingredient();
            $ingradient->setNom("Ingaradient #" . $i)
                ->setPrix(mt_rand(0, 100));
            $manager->persist($ingradient);

        }




        $manager->flush();
    }
}
