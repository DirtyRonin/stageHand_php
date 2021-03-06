<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

if (env('APP_ENV') == 'local') {
    Route::get('/', function () {
        $packageNumber = env('JS_PACKAGE_NUMBER');
        return view('welcome',compact('packageNumber'));
    });
}
if (env('APP_ENV') == 'production') {
    Route::get('/', function () {
        $packageNumber = env('JS_PACKAGE_NUMBER');
        return view('welcomeProd',compact('packageNumber'));
    });
}
