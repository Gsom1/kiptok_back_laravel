<?php


namespace App\Models\Repository;


use App\Models\Entity\Video;

class VideoRepository
{
    private $storage = [
        1 => '/videos/1.mp4',
        2 => '/videos/2.mp4',
        3 => '/videos/3.mp4',
//        4 => '44',
//        5 => '55',
//        6 => '66',
//        7 => '77',
    ];

    /**
     * @return array<int, string>
     */
    public function getVideos(): array
    {
        $result = [];
        foreach ($this->storage as $url) {
            $result[] = new Video($url);
        }

        return $result;
    }
}
