<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticlesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 15; $i++){
            $article = new Article();
            $article
                ->setLib(
                    "Article ".$i." - ".mt_rand(1, 1999)
                )
                ->setPrice( mt_rand(1000, 15000) )
                ->setCategorie( $this->getReference(ArticlesCategorie::ARTICLE_CATEGORIE_REFERENCE) )
                ->addArticlesOption( $this->getReference(ArticlesOption::ARTICLE_OPTIONS_REFERENCE) );

            $manager->persist($article);

            unset($article);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ArticlesOption::class,
        ];
    }
}
