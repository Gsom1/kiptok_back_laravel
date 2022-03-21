<?php

namespace App\Controller\V1;

use App\Entity\PlayerEvent;
use App\Repository\PlayerEventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class StatController extends AbstractController
{
    public function __construct(
        private PlayerEventRepository $playerEventRepository,
        private EntityManagerInterface $entityManager
    )
    {
    }

    public function play(Request $request)
    {
        //TODO validation
        $event = new PlayerEvent();
        $event->setVideoId($request->get('video_id'));
        $event->setName($request->get('name'));
        $event->setSessionId($request->getSession()->getId());
        $event->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($event);
        $this->entityManager->flush();

        return $this->json('ok');
    }

    public function pause()
    {

    }

    public function swipe()
    {

    }
}
