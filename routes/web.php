<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    return view('testing');
});

Route::get('/matchFish', [App\Http\Controllers\MatchFishController::class, 'index'])->name('matchFish_index');
Route::get('/matchFish/statistik', [App\Http\Controllers\MatchFishController::class, 'statistik'])->name('matchFish_statistik');
Route::post('/matchFish/statistik/cari', [App\Http\Controllers\MatchFishController::class, 'find'])->name('matchFish_filter');
Route::post('/matchFish/import_csv', [App\Http\Controllers\MatchFishController::class, 'import_csv'])->name('matchFish_importcsv');
Route::post('/matchFish/import_excel', [App\Http\Controllers\MatchFishController::class, 'import_excel'])->name('matchFish_importexcel');

