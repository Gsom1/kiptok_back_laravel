<?php

namespace App\Controller\V1;

use App\App\UseCases\Feeder\Feeder;
use App\Entity\FeedCursor;
use App\Repository\FeedCursorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;

class VideosController extends AbstractController
{
    public function __construct(
        private Feeder               $feeder,
        private FeedCursorRepository $feedCursorRepository,
        private RequestStack         $requestStack
    ) {
    }

    public function getVideos()
    {
        $session = $this->requestStack->getSession();
        $feedCursor = $session->get('feed_cursor');
        if ($feedCursor) {
            $feedCursor = $this->feedCursorRepository->find($feedCursor);
        }
        if (!$feedCursor) {
            $feedCursor = new FeedCursor();
        }

        $videos = $this->feeder->getVideos($feedCursor);
        $session->set('feed_cursor', (string)$feedCursor->getId());

        return $this->json($videos);
    }
}
