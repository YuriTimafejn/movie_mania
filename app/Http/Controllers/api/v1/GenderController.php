<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index() {
        $genders = Gender::where('active', true)->get();

        return response()->json($genders->makeHidden(['created_at', 'updated_at', 'active']), 200, [], JSON_PRETTY_PRINT);
    }    
    
    public function store(Request $request) {
        $data = [
            'gender' => strtoupper($request->gender),
            'notes' => $request->notes,
        ];
        Gender::create($data);
        return redirect('/gender');
    }

    public function update(Request $request, $id) {
        $register = Gender::findOrFail($id);

        if($register){
            $register->update([
                $register->gender = strtoupper($request->gender), 
                $register->notes = strtoupper($request->notes)
            ]);
        }
        return redirect('/gender');
    }

    public function destroy($id) {
        return "";
    }

    public function show($id) {
        $gender = Gender::find($id);
        return response()->json($gender->makeHidden(['created_at', 'updated_at', 'active']), 200, [], JSON_PRETTY_PRINT);
    }
}
