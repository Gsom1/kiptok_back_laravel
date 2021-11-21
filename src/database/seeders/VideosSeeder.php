<?php

namespace Database\Seeders;

use App\Models\Repository\VideoRepository;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    private VideoRepository $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    private $videos = [
        ['url' => '/videos/1.mp4', 'poster' => '/posters/01.png'],
        ['url' => '/videos/2.mp4', 'poster' => '/posters/02.png'],
        ['url' => '/videos/3.mp4', 'poster' => '/posters/03.png'],
        ['url' => '/videos/4.mp4', 'poster' => '/posters/04.png'],
        ['url' => '/videos/5.mp4', 'poster' => '/posters/05.png'],
        ['url' => '/videos/6.mp4', 'poster' => '/posters/06.png'],
        ['url' => '/videos/7.mp4', 'poster' => '/posters/07.png'],
        ['url' => '/videos/8.mp4', 'poster' => '/posters/08.png'],
        ['url' => '/videos/9.mp4', 'poster' => '/posters/09.png'],
        ['url' => '/videos/10.mp4', 'poster' => '/posters/10.png'],
        ['url' => '/videos/11.mp4', 'poster' => '/posters/11.png'],
        ['url' => '/videos/12.mp4', 'poster' => '/posters/12.png'],
        ['url' => '/videos/13.mp4', 'poster' => '/posters/13.png'],
        ['url' => '/videos/14.mp4', 'poster' => '/posters/14.png'],
        ['url' => '/videos/15.mp4', 'poster' => '/posters/15.png'],
        ['url' => '/videos/16.mp4', 'poster' => '/posters/16.png'],
        ['url' => '/videos/17.mp4', 'poster' => '/posters/17.png'],
        ['url' => '/videos/18.mp4', 'poster' => '/posters/18.png'],
        ['url' => '/videos/19.mp4', 'poster' => '/posters/19.png'],
        ['url' => '/videos/20.mp4', 'poster' => '/posters/20.png'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->videos as $row) {
            $this->videoRepository->insert($row['url'], $row['poster']);
        }
    }
}
