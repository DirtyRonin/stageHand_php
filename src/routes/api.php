<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\SetlistController;
use App\Http\Controllers\SetlistSongController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BandSongController;
use App\Http\Controllers\CustomEvent;
use App\Http\Controllers\CustomEventController;
use Illuminate\Http\Request;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

//StageHand 
//Public Calls

//Public Routes
// Route::get('/songsSearch/{search}', function($search){
//     return 'hit the spot '.$search;
// });





//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/songs', [SongController::class, 'index']);
    Route::post('/songs', [SongController::class, 'store']);
    Route::get('/songs/{id}', [SongController::class, 'show']);
    Route::get('/songsSearch/{search}', [SongController::class, 'filter']);
    Route::put('/songs/{id}', [SongController::class, 'update']);
    Route::delete('/songs/{id}', [SongController::class, 'destroy']);
    Route::get('/songsHaveSetlist/{setlistId}', [SongController::class, 'showSongsWithSetlistCount']);
    Route::get('/songsHaveSetlistSearch/{setlistId}/{search}', [SongController::class, 'filterSongsWithSetlistCount']);

    Route::get('/bands', [BandController::class, 'index']);
    Route::post('/bands', [BandController::class, 'store']);
    Route::get('/bands/{id}', [BandController::class, 'show']);
    Route::get('/bandsSearch/{search}', [BandController::class, 'filter']);
    Route::put('/bands/{id}', [BandController::class, 'update']);
    Route::delete('/bands/{id}', [BandController::class, 'destroy']);
    Route::get('/bandsHaveSong/{songId}', [BandController::class, 'showBandsWithSongCount']);
    Route::get('/bandsHaveSongSearch/{songId}/{search}', [BandController::class, 'filterBandsWithSongCount']);
    

    // store und destroy sind ausgeblendet, da jedes custom event eine playlist besitzt 
    // 1:1 Verhältnis
    Route::get('/setlists', [SetlistController::class, 'index']);
    // Route::post('/setlists', [SetlistController::class, 'store']);
    Route::get('/setlists/{id}', [SetlistController::class, 'show']);
    Route::get('/setlistsSearch/{search}', [SetlistController::class, 'filter']);
    Route::put('/setlists/{id}', [SetlistController::class, 'update']);
    // Route::delete('/setlists/{id}', [SetlistController::class, 'destroy']);
    Route::get('/setlistsHaveSong/{songId}', [SetlistController::class, 'showSetlistsWithSongCount']);
    Route::get('/setlistsHaveSongSearch/{songId}/{search}', [SetlistController::class, 'filterSetlistsWithSongCount']);

    Route::get('/locations', [LocationController::class, 'index']);
    Route::post('/locations', [LocationController::class, 'store']);
    Route::get('/locations/{id}', [LocationController::class, 'show']);
    Route::get('/locationsSearch/{search}', [LocationController::class, 'filter']);
    Route::put('/locations/{id}', [LocationController::class, 'update']);
    Route::delete('/locations/{id}', [LocationController::class, 'destroy']);

    Route::get('/bandsongs/{bandId}', [BandSongController::class, 'index']);
    Route::get('/bandsongs/{bandId}/{songId}', [BandSongController::class, 'show']);
    Route::post('/bandsongs', [BandSongController::class, 'store']);
    Route::get('/bandsongsSearch/{bandId}/{search}', [BandSongController::class, 'filter']);
    Route::put('/bandsongs/{bandId}', [BandSongController::class, 'update']);
    Route::delete('/bandsongs/{bandId}/{songId}', [BandSongController::class, 'destroy']);
    Route::post('/bandsongsAddSong', [BandSongController::class, 'addSongToBand']);
    
    Route::get('/setlistsongs/{setlistsongId}', [SetlistSongController::class, 'index']);
    Route::get('/setlistsongs/{setlistsongId}/{songId}', [SetlistSongController::class, 'show']);
    Route::post('/setlistsongs', [SetlistSongController::class, 'store']);
    Route::get('/setlistsongsSearch/{setlistsongId}/{search}', [SetlistSongController::class, 'filter']);
    Route::put('/setlistsongs/{setlistsongId}', [SetlistSongController::class, 'update']);
    Route::delete('/setlistsongs/{setlistsongId}/{songId}', [SetlistSongController::class, 'destroy']);
    Route::post('/setlistsongsAddSong', [SetlistSongController::class, 'addSongToSetlist']);
    Route::get('/setlistsongsEditor/{customEventId}', [SetlistSongController::class, 'setlistEditor']);
    Route::put('/setlistsongsSwap', [SetlistSongController::class, 'swapOrder']);
    Route::get('/setlistsongs/{customEventId}', [SetlistSongController::class, 'setlistEditor']);


    Route::get('/customevents', [CustomEventController::class, 'index']);
    Route::post('/customevents', [CustomEventController::class, 'store']);
    Route::get('/customevents/{id}', [CustomEventController::class, 'show']);
    Route::get('/customeventsSearch/{search}', [CustomEventController::class, 'filter']);
    Route::put('/customevents/{id}', [CustomEventController::class, 'update']);
    Route::delete('/customevents/{id}', [CustomEventController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/currentUser', [AuthController::class, 'currentUser']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

