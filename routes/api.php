<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// /user/XXX: In addition to "auth", this group will have middleware "simple_users"
Route::group(['prefix' => 'v1'], function () {

Route::get('/people', [HomeController::class,'listPeople'])->name('person.get');
Route::get('/people/{person_id}', [HomeController::class,'showPeople'])->name('person.show');
Route::get('/films', [HomeController::class,'listFilms'])->name('film.get');
Route::get('/films/{film_id}', [HomeController::class,'showFilms'])->name('film.show');
Route::get('/galaxy/', [HomeController::class,'galaxyDetails'])->name('galaxy.show');
})->middleware('cors');
