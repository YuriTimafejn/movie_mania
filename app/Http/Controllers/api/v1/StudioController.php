<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudioRequest;
use Illuminate\Http\Request;
use App\Models\Studio;

class StudioController extends Controller
{
    public function index() {
        $studios = Studio::where('active', true)->get();

        return response()->json($studios->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']), 200, [], JSON_PRETTY_PRINT);
    }


    public function store(StoreStudioRequest $request) {
        $data = [
            'studio' => ucwords($request->studio),
            'notes' => ucwords($request->notes),
        ];

        $newStudio = Studio::create($data);

        return response()->json(
            $newStudio->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']),
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

    public function update($id, Request $request) {
        Studio::findOrFail($id)->update([
            'studio' => ucwords($request->studio),
            'notes' => ucwords($request->notes),
        ]);

        $updatedStudio = Studio::findOrFail($id);

        return response()->json(
            $updatedStudio->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']),
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

    public function destroy($id) {
        Studio::findOrFail($id)->delete();
    }

    public function show($id) {
        $studio = Studio::findOrFail($id);
        return response()->json(
            $studio->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']),
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }
}
