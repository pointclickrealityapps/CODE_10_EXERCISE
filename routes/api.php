<?php

use App\Http\Controllers\Api\V1\ApiController;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'v1'], function () {
    Route::get('/', [ApiController::class, 'listPeople'])->name('index');
    Route::get('/people', [ApiController::class, 'listPeople'])->name('person.get');
    Route::get('/people/{personId}/wookiee', [ApiController::class, 'showPeopleWookieLanguage'])->name('person.wookiee');
    Route::get('/people/{personId}', [ApiController::class, 'showPeople'])->name('person.show');
    Route::get('/films', [ApiController::class, 'listFilms'])->name('films.get');
    Route::get('/films/{film_id}', [ApiController::class, 'showFilms'])->name('films.show');
    Route::get('/galaxy/', [ApiController::class, 'galaxyDetails'])->name('galaxy.show');
})->middleware('cors');
