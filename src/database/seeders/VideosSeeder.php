<?php

namespace Database\Seeders;

use App\Models\Repository\VideoRepository;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    private $videos = [
        '/videos/1.mp4',
        '/videos/2.mp4',
        '/videos/3.mp4',
        '/videos/4.mp4',
        '/videos/5.mp4',
        '/videos/6.mp4',
        '/videos/7.mp4',
        '/videos/8.mp4',
        '/videos/9.mp4',
        '/videos/10.mp4',
        '/videos/11.mp4',
        '/videos/12.mp4',
        '/videos/13.mp4',
        '/videos/14.mp4',
        '/videos/15.mp4',
        '/videos/16.mp4',
        '/videos/17.mp4',
        '/videos/18.mp4',
        '/videos/19.mp4',
        '/videos/20.mp4',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->videos as $url) {
            $this->videoRepository->insert($url);
        }
    }
}
