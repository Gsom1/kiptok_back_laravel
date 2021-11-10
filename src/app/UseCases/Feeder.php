<?php


namespace App\UseCases;


use App\Models\FeedCursor;
use App\Models\Repository\FeedTokenRepository;
use App\Models\Repository\VideoRepository;

class Feeder
{
    public function __construct(
        private VideoRepository $videoRepository,
        private FeedTokenRepository $feedTokenRepository,
        private int $limit = 5,
    ) {
    }

    public function getPortion(FeedCursor $feedToken): array
    {
        $videos = $this->videoRepository->getVideos($feedToken->to, $this->limit);
        $count = count($videos);
        if ($count >= $this->limit) {
            $feedToken->to += $this->limit;
            $this->feedTokenRepository->save($feedToken);
        } elseif (0 === $count) {
            $feedToken->from = 0;
            $feedToken->to = 0;
            $videos = $this->videoRepository->getVideos($feedToken->to, $this->limit);
            $feedToken->to = $this->limit;
            $this->feedTokenRepository->save($feedToken);
        } else { //got last part form the end of table and we need do take some from the beginning
            $rest = $this->limit - $count;
            $scndPart = $this->videoRepository->getVideos(0, $rest);
            $feedToken->from = 0;
            $feedToken->to = $rest;
            $this->feedTokenRepository->save($feedToken);
            $videos = array_merge($videos, $scndPart);
        }

        return $videos;
    }
}
