<?php

namespace App\DataFixtures;

use App\Entity\ContentTag;
use App\Entity\Video;
use App\Entity\VideoTagMap;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private array $tags = [
        1 => 'cats',
        2 => 'dogs',
        3 => 'php',
        4 => 'pizza',
        5 => 'beer',
    ];

    public function load(ObjectManager $manager): void
    {
        $videoIds = [];
        for ($i = 0; $i < 20; $i++) {
            $video = new Video();
            $video->setUrl('videos/ ' . $i . '.mp4');
            $video->setPoster('posters/ ' . sprintf("%02d", $i) . '.png');
            $video->setCreatedAt(new DateTimeImmutable());
            $manager->persist($video);
            $videoIds[] = $video->getId();
        }

        foreach ($this->tags as $key => $name) {
            $tag = new ContentTag();
            $tag->setId($key);
            $tag->setName($name);
            $manager->persist($tag);
        }

        $manager->flush();

        $this->generateTagMap($manager, $videoIds);

        $manager->flush();
    }

    private function generateTagMap(ObjectManager $manager, array $ids): void
    {
        foreach ($ids as $videoId) {
            $tagMap = new VideoTagMap();
            $tagMap->setVideoId($videoId);
            $tagMap->setTagId($this->tags[random_int(1, 5)]);
            $manager->persist($tagMap);
        }
    }
}
