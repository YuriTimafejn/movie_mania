<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\StoreVideoRequest;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\DTO\VideoShortDTO;
use App\DTO\VideoCompleteDTO;

class VideoController extends Controller
{
    public function index(): JsonResponse
    {
        $videos = Video::all();
        $dto = [];

        foreach ($videos as $video) {
            array_push($dto, new VideoShortDTO($video));
        }

        return response()->json(
            $dto,
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

    public function store(StoreVideoRequest $request): JsonResponse
    {
//        dd(explode(',', $request->genders[0]));
        $data = [
            "title" => $request->title,
            "original_title" => $request->original_title,
            "sinopse" => $request->sinopse,
            "type" => $request->type,
            "score" => $request->score,
            "personal_score" => $request->personal_score,
            "watched" => $request->watched,
            "notes" => $request->notes,
            "director_id" => $request->director_id,
            "studio_id" => $request->studio_id,
        ];

        $newVideo = Video::create($data);
        $newVideo->genders()->attach(explode(',', $request->genders[0]));
        return response()->json(
            $newVideo->id,
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }


    public function update(Request $request, $id) {
        Gender::findOrFail($id)->update([
            "title"=> $request->title,
            "original_title"=> $request->original_title,
            "sinopse"=> $request->sinopse,
            "type"=> $request->type,
            "score"=> $request->score,
            "personal_score"=> $request->personal_score,
            "watched"=> $request->watched,
            "notes"=> $request->notes,
            "director_id"=> $request->director_id,
            "studio_id"=> $request->studio_id,
        ]);
    }

    public function destroy($id) {
        Video::findOrFail($id)->delete();
    }

    public function show($id) {
        $video = Video::findOrFail($id);

        $dto = new VideoCompleteDTO($video);

        return response()->json(
            $dto,
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }
}
