<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Studio;

class StudioController extends Controller
{
    public function index() {
        $studios = Studio::where('active', true)->get();

        return response()->json($studios->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']), 200, [], JSON_PRETTY_PRINT);
    }    
    
    
    public function store(Request $request) {
        $data = [
            'studio' => ucwords($request->studio),
            'notes' => ucwords($request->notes),
        ];
        
        $studio = Studio::create($data);

        return response($studio->id, 200);
    }

    public function update($id, Request $request) {
        $studio = Studio::findOrFail($id)->update([
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
