<?php

namespace App\Repository;

use App\Entity\Video;
use App\Entity\VideoTagMap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Video::class);
    }

    public function findFromLimit(int $from, int $limit)
    {
        return $this->createQueryBuilder('v')
                    ->join(VideoTagMap::class, 'vtm', Join::WITH, 'v.id = vtm.video_id')
                    ->andWhere('v.id > :from')
                    ->setParameter('from', $from)
                    ->setMaxResults($limit)
                    ->getQuery()
                    ->getResult()
        ;
    }

    public function findFirst(): ?Video
    {
        return $this->createQueryBuilder('v')
                    ->orderBy('v.id', 'asc')
                    ->setMaxResults(1)
                    ->getQuery()
                    ->getOneOrNullResult()
        ;
    }
}
