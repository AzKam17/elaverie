<?php

namespace App\Repository;

use App\Entity\ArticlesCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticlesCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticlesCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticlesCategorie[]    findAll()
 * @method ArticlesCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticlesCategorie::class);
    }

    // /**
    //  * @return ArticlesCategorie[] Returns an array of ArticlesCategorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticlesCategorie
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
