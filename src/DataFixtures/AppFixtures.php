<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Articles;
use App\Entity\Commands;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // crée 100 articles fictifs
        for ($i = 0; $i < 100; $i++) {
            $articles = new Articles();
            $articles->setName('Article '.$i);
            $articles->setPrice(rand(1, 100));
            $articles->setWeight(rand(1, 100));
            $articles->setImage('https://via.placeholder.com/150');
            $manager->persist($articles );
        }

        $manager->flush();
    }
}
