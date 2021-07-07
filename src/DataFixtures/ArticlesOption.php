<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlesOption extends Fixture
{
    public const ARTICLE_OPTIONS_REFERENCE = 'article-options';

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $art_opt = new \App\Entity\ArticlesOption();

        $art_opt
            ->setLib("Option ")
            ->setPrice( mt_rand(500, 2000) )
            ->setIsVisible(true);

        $manager->persist($art_opt);
        $manager->flush();

        $this->addReference( self::ARTICLE_OPTIONS_REFERENCE, $art_opt );
    }
}
