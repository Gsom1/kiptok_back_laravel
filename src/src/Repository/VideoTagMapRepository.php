<?php

namespace App\Repository;

use App\Entity\Video;
use App\Entity\VideoTagMap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VideoTagMap|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoTagMap|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoTagMap[]    findAll()
 * @method VideoTagMap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoTagMapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoTagMap::class);
    }

    public function getVideosByTags(array $tags)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select()
            ->from(Video::class, 'v')
            ->addSelect('v')
            ->leftJoin(VideoTagMap::class, 'vtm', Join::WITH, 'v.id = vtm.video_id')
            ->where('vtm.tag_name IN (:tags)')
            ->setParameter('tags', $tags)
            ->getQuery()
            ->getResult()
            ;
    }
}
