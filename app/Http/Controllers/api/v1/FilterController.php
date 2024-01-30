<?php

namespace App\Http\Controllers\api\v1;

use App\DTO\VideoByFilterDTO;
use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Gender;
use App\Models\Studio;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class FilterController extends Controller
{
    public function index($filter): JsonResponse
    {
        $response = $this->returnFilter(Str::lower(Str::ascii($filter)));

        return response()->json(
            $response,
            200,
            [],
            JSON_PRETTY_PRINT
    );

    }

    public function filter($filter, $slug)
    {
        switch ($filter) {
            case "directors":
                $director = Director::where('slug', $slug)->get();

                $videos = Video::where(
                    'director_id',
                    $director->first->director->id
                )->get();

                return $this->getCollection($videos);
            case "genders":
                $gender = Gender::where('slug', $slug)->get();

                $videos = Video::whereHas(
                    'gender_id',
                    function ($query) use ($gender) {
                        $query->where('gender_id', $gender->first->gender->id);
                    }
                )->get();

                return $this->getCollection($videos);
            case "studios":
                $studio = Studio::where('slug', $slug)->get();

                $videos = Video::where(
                    'studio_id',
                    $studio->first->studio->id
                )->get();

                return $this->getCollection($videos);
        }
    }

    private function returnFilter($filter)
    {
        switch ($filter) {
            case "directors":
                $directors = Director::all();
                $videosByDirectors = [];

                foreach ($directors as $director) {
                    $video = Video::where(
                        'director_id',
                        $director->id
                    )->get();

                    if($video->isNotEmpty()){
                        $videosByDirectors[$director->director] = $this->getCollection($video);
                    }
                }
                return $videosByDirectors;
            case "genders":
                $genders = Gender::all();
                $videosByGender = [];

                foreach ($genders as $gender) {
                    $video = Video::whereHas(
                        'genders',
                        function ($query) use ($gender) {
                            $query->where('genders.id', $gender->id);
                        }
                    )->get();

                    if($video->isNotEmpty()) {
                        $videosByGender[$gender->gender] = $this->getCollection($video);
                    }
                }
                return $videosByGender;
            case "studios":
                $studios = Studio::all();
                $videosByStudio = [];

                foreach ($studios as $studio) {
                    $video = Video::where(
                        'studio_id',
                        $studio->id
                    )->get();

                    if($video->isNotEmpty()) {
                        $videosByStudio[$studio->studio] = $this->getCollection($video);
                    }
                }
                return $videosByStudio;
        }
    }


    /**
     * @param $array
     * @return array
     */
    private function getCollection($array): array
    {
        $collection = [];
        foreach ($array as $v) {
            $collection[] = [
                "id" => $v->id,
                "title" => $v->title,
                "watched" => $v->watched,
            ];
        }
        return $collection;
    }
}
