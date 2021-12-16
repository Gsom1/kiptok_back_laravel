<?php

namespace App\Repository;

use App\Entity\FeedCursor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FeedCursor|null find($id, $lockMode = null, $lockVersion = null)
 * @method FeedCursor|null findOneBy(array $criteria, array $orderBy = null)
 * @method FeedCursor[]    findAll()
 * @method FeedCursor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeedCursorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FeedCursor::class);
    }

    // /**
    //  * @return FeedCursor[] Returns an array of FeedCursor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FeedCursor
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
