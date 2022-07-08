<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products
        for ($i = 0; $i < 5; $i++) {
            $product = new Categorie();
            $product->setNom('Categorie n°'.$i);
            $manager->persist($product);
        }

        $manager->flush();
    }
}