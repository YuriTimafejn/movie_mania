<?php

namespace App\Http\Controllers\api\v1;

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

                    $videosByDirectors[$director->director] = $video;
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

                    $videosByGender[$gender->gender] = $video;
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

                    $videosByStudio[$studio->studio] = $video;
                }

                return $videosByStudio;
        }
    }
}
