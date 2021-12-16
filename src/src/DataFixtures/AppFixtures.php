<?php

namespace App\DataFixtures;

use App\Entity\Video;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $video = new Video();
            $video->setUrl('videos/ ' . $i . '.mp4');
            $video->setUrl('posters/ ' . sprintf("%02d", $i) . '.png');
            $video->setCreatedAt(new DateTimeImmutable());
            $manager->persist($video);
        }

        $manager->flush();
    }
}
