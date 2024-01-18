<?php

namespace App\DTO;

use App\Models\Video;

class VideoCompleteDTO
{
    public $id;
    public $title;
    public $original_title;
    public $sinopse;
    public $watched;
    public $notes;
    public $director_id;
    public $director;
    public $studio_id;
    public $studio;
    public $genders = [];
    public $images = [];


    public function __construct(Video $video) {
        $this->id = $video->id;
        $this->title = $video->title;
        $this->original_title = $video->original_title;
        $this->sinopse = $video->sinopse;
        $this->watched = $video->watched;
        $this->notes = $video->notes;
        $this->director_id = $video->director_id;
        if(!is_null($video->director)) $this->director = $video->director->director;
        $this->studio_id = $video->studio_id;
        if(!is_null($video->studio)) $this->studio = $video->studio->studio;
        if(!is_null($video->genders)) $this->genders = $this->genderList($video->genders);
        if(!is_null($video->images)) $this->images = $this->imagesUrlList($video->images);
    }

    private function genderList($array): array
    {
        $list = [];
        foreach ($array as $e) {
            $list[] = $e['gender'];
        }

        return $list;
    }

    private function imagesUrlList($array): array
    {
        $list = [];
        foreach ($array as $e) {
            $list[] = $e['url'];
        }

        return $list;
    }
}
