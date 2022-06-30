<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;


class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <=10; $i++) {
           $article = new Article();
           $article ->setNom("Nom de l'article n°$i");
           $article ->setPrix(9.99);
           $article ->setPhotoTicket("http://placehold.it/350x150");
           $article ->setDateAchat(new \DateTime());
           $article ->setDateGarantie(new \DateTime());
           $article ->setLieuAchat("Lieu d'achat");
           $article ->setZoneSaisie("Zone de saisie");
           $article ->setNotice("Notice"); 
                    
            $manager->persist($article);
        }

        $manager->flush();
    }
}
