<?php

namespace App\App\UseCases\Feeder;

use App\Entity\FeedCursor;
use App\Repository\VideoRepository;
use Doctrine\ORM\EntityManagerInterface;

class Feeder
{
    public function __construct(
        private VideoRepository        $videoRepository,
        private EntityManagerInterface $em,
        private int                    $limit = 3
    ) {
    }

    public function getVideos(FeedCursor $cursor): array
    {
        if (null === $cursor->getStart()) {
            $cursor->setStart($this->videoRepository->findFirst()->getId());
        }
        if (null === $cursor->getLast()) {
            $cursor->setLast($cursor->getStart());
        }

        $videos = $this->videoRepository->findFromLimit($cursor->getLast(), $this->limit);
        $count = count($videos);
        if ($count >= $this->limit) {
            $cursor->setLast($cursor->getLast() + $this->limit);
        } elseif (0 === $count) {
            $cursor->setStart(0);
            $cursor->setLast(0);
            $videos = $this->videoRepository->findFromLimit($cursor->getStart(), $this->limit);
            $cursor->setLast($this->limit);
        } else { //got last part form the end of table and we need to take some from the beginning
            $rest = $this->limit - $count;
            $scndPart = $this->videoRepository->findFromLimit(0, $rest);
            $cursor->setStart(0);
            $cursor->setLast($rest);
            $videos = array_merge($videos, $scndPart);
        }

        $this->em->persist($cursor);
        $this->em->flush();

        return $videos;
    }
}
