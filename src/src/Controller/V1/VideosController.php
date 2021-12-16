<?php

namespace App\Controller\V1;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VideosController extends AbstractController
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function getVideos()
    {
        $videos = $this->videoRepository->findAll();

        return $this->json($videos);
    }
}
