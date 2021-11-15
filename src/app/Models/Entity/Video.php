<?php


namespace App\Models\Entity;


class Video
{
    public $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }
}
