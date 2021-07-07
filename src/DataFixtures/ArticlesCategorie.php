<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlesCategorie extends Fixture
{
    public const ARTICLE_CATEGORIE_REFERENCE = 'article-categorie';

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $categorie = new \App\Entity\ArticlesCategorie();
        $categorie
            ->setLib("Categorie V".mt_rand(1, 10));


        $manager->persist($categorie);
        $manager->flush();

        $this->addReference( self::ARTICLE_CATEGORIE_REFERENCE, $categorie );
    }
}
