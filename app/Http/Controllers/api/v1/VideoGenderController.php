<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoGenderRequest;
use App\Models\Gender;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoGenderController extends Controller
{
    public function addGender($idVideo, VideoGenderRequest $request)
    {
        $video = Video::findOrFail($idVideo);
        $video->genders()->syncWithoutDetaching($request->gender);

        $gender = Gender::find($request->gender);

        return response()->json(
            "Gender '" . $gender->gender . "' has added",
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

    public function removeGender($idVideo, VideoGenderRequest $request)
    {
        $video = Video::findOrFail($idVideo);
        $video->genders()->detach($request->gender);

        $gender = Gender::find($request->gender);

        return response()->json(
            "Gender '" . $gender->gender . "' has removed",
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }
}
