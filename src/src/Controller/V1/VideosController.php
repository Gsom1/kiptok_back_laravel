<?php

namespace App\Controller\V1;

use App\App\UseCases\Feeder\Feeder;
use App\Entity\FeedCursor;
use App\Repository\FeedCursorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;

class VideosController extends AbstractController
{
    public function __construct(
        private Feeder               $feeder,
        private FeedCursorRepository $feedCursorRepository,
    ) {
    }

    public function getVideos(Request $request)
    {
        $feedCursor = $request->cookies->get('feed_cursor');
        if ($feedCursor) {
            $feedCursor = $this->feedCursorRepository->find($feedCursor);
        }
        if (!$feedCursor) {
            $feedCursor = new FeedCursor();
        }

        $videos = $this->feeder->getVideos($feedCursor);

        $response = $this->json($videos);
        $cookie = new Cookie('feed_cursor', (string)$feedCursor->getId());
        $response->headers->setCookie($cookie);

        return $response;
    }
}
