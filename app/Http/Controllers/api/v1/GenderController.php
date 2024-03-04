<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenderRequest;
use App\Http\Requests\UpdateGenderRequest;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index() {
        $genders = Gender::where('active', true)->get();

        return response()->json($genders->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']), 200, [], JSON_PRETTY_PRINT);
    }

    public function store(StoreGenderRequest $request) {
        $data = [
            'gender' => strtoupper($request->gender),
            'notes' => $request->notes,
        ];
        $newGender = Gender::create($data);

        return response()->json(
            $newGender->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']),
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

    public function update(UpdateGenderRequest $request, $id) {
        Gender::findOrFail($id)->update($request->all());
    }

    public function destroy($id) {
        Gender::findOrFail($id)->delete();

    }

    public function show($id) {
        $gender = Gender::find($id);
        return response()->json($gender->makeHidden(['created_at', 'updated_at', 'deleted_at', 'active']), 200, [], JSON_PRETTY_PRINT);
    }
}
