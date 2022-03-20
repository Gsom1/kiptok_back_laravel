<?php

namespace App\Entity;

use App\Repository\VideoTagMapRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoTagMapRepository::class)
 */
class VideoTagMap
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Video", inversedBy="tags")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     */
    protected $video;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private int $video_id;

    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private string $tag_name;

    public function getVideoId(): ?int
    {
        return $this->video_id;
    }

    public function setVideoId(int $video_id): self
    {
        $this->video_id = $video_id;

        return $this;
    }

    public function getTagName(): ?string
    {
        return $this->tag_name;
    }

    public function setTagId(string $tag_name): self
    {
        $this->tag_name = $tag_name;

        return $this;
    }

    public function getVideo(): Video
    {
        return $this->video;
    }
}
