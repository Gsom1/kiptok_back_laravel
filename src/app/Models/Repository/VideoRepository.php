<?php


namespace App\Models\Repository;


use App\Models\Entity\Video as VideoEntity;
use App\Models\Video;

class VideoRepository
{
    public function __construct(private Video $model)
    {
    }

    /**
     * @param int $from
     * @param int $limit
     * @return array<int, VideoEntity>
     */
    public function getVideos(int $from, int $limit): array
    {
        return $this->model
            ->where(Video::FIELD_ID, '>', $from)
            ->limit($limit)
            ->get()
            ->toArray()
            ;
    }

    public function insert(string $url): void
    {
        $this->model->insert(
            [
                [Video::FIELD_URL => $url]
            ]
        );
    }
}