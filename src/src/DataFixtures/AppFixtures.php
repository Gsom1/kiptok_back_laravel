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
            $video->setUrl('videos/' . $i . '.mp4');
            $video->setPoster('posters/' .  $i . '.png');
            $video->setCreatedAt(new DateTimeImmutable());
            $manager->persist($video);
            $videoIds[] = $video->getId();
        }
        $manager->flush();

        foreach ($this->tags as $key => $name) {
            $tag = new ContentTag();
            $tag->setId($key);
            $tag->setName($name);
            $manager->persist($tag);
        }
        $manager->flush();
        $this->generateTagMap($manager, $videoIds);
    }

    private function generateTagMap(ObjectManager $manager, array $ids): void
    {
        $connection = $manager->getConnection();

        foreach ($ids as $videoId) {
            $tag = $this->tags[random_int(1, 5)];
            $sql = "insert into video_tag_map (video_id, tag_name) VALUES ($videoId, '$tag');";
            $connection->exec($sql);
        }
    }
}
