<?php

namespace App\Repository;

use App\Entity\ArticlesOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticlesOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticlesOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticlesOption[]    findAll()
 * @method ArticlesOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticlesOption::class);
    }

    // /**
    //  * @return ArticlesOption[] Returns an array of ArticlesOption objects
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
    public function findOneBySomeField($value): ?ArticlesOption
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
