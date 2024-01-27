<?php

namespace App\DTO;

use App\Models\Video;

class VideoByFilterDTO
{
    private $id;
    private $title;
    private $original_title;
    private $watched;

    public function __construct(Video $video) {
        $this->id = $video->id;
        $this->title = $video->title;
        $this->original_title = $video->original_title;
        $this->watched = $video->watched;
    }
}
