<?php

namespace App\Entity;

use App\Repository\FeedCursorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FeedCursorRepository::class)
 */
class FeedCursor
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $start;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $last;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $single = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }

    public function setStart(int $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getLast(): ?int
    {
        return $this->last;
    }

    public function setLast(?int $last): self
    {
        $this->last = $last;

        return $this;
    }

    public function getSingle(): ?array
    {
        return $this->single;
    }

    public function setSingle(?array $single): self
    {
        $this->single = $single;

        return $this;
    }
}
