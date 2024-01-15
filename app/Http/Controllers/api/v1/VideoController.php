<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use Illuminate\Log;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\DTO\VideoShortDTO;

class VideoController extends Controller
{
    public function index() {
        $videos = Video::all();
        $dto[] = null;

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

    public function listBy($slug) {
        return $slug;
    }    
    
    public function store(Request $request) {        
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
        return response()->json(
            $newVideo->id,
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }
    

    public function update(Request $request, $id) {
        return "";
    }

    public function destroy($id) {
        Video::findOrFail($id)->delete();
    }

    public function show($id) {
        $video = Video::findOrFail($id);

        dd($video->studio);
    }
}
