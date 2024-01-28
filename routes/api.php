<?php

use App\Http\Controllers\api\v1\FilterController;
use App\Http\Controllers\api\v1\GenderController;
use App\Http\Controllers\api\v1\StudioController;
use App\Http\Controllers\api\v1\DirectorController;
use App\Http\Controllers\api\v1\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function(){
    Route::resource('gender', GenderController::class)->except('create', 'edit');
    Route::resource('studio', StudioController::class)->except('create', 'edit');
    Route::resource('director', DirectorController::class)->except('create', 'edit');
    Route::resource('video', VideoController::class)->except('create', 'edit');

    Route::get('video/f/{filter}', [FilterController::class, 'index']);
    Route::get('video/f/{filter}/{slug}', [FilterController::class, 'filter']);
});
