<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index() {
        return "Tested principal route";
    }

    public function listBy($slug) {
        return $slug;
    }    
    
    public function store(Request $request) {
        dd($request->get('content'));
        return "";
    }

    public function update(Request $request, $id) {
        return "";
    }

    public function destroy(Request $request, $id) {
        return "";
    }

    public function show(Request $request, $id) {
        return "";
    }
}
