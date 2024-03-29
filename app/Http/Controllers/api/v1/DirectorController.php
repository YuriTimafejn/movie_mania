<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index() {
        $directors = Director::where('active', true)->get();

        return response()->json($directors->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']), 200, [], JSON_PRETTY_PRINT);
    }

    public function store(StoreDirectorRequest $request) {
        $newDirector = Director::create([
            'director' => ucwords($request->director),
            'notes' => $request->notes,
        ]);

        return response()->json(
            $newDirector->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']),
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

    public function update(UpdateDirectorRequest $request, $id) {
        Director::findOrFail($id)->update($request->all());

        return response()->json(
            Director::findOrFail($id)->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']),
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

    public function destroy($id) {
        Director::findOrFail($id)->delete();
    }

    public function show($id) {
        $directo = Director::findOrFail($id);

        return response()->json($directo->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']), 200, [], JSON_PRETTY_PRINT);
    }
}
