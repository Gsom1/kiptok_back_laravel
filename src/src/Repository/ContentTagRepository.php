<?php

namespace App\Repository;

use App\Entity\ContentTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentTag[]    findAll()
 * @method ContentTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentTag::class);
    }
}
