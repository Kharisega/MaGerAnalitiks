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
    return view('layouts.sidebar');
});

// * Event Golden Malam Match Fish
// ? index
Route::get('/matchFish', [App\Http\Controllers\MatchFishController::class, 'index'])->name('matchFish_index');
// ? AveragePerDay
Route::get('/matchFish/perDay', [App\Http\Controllers\MatchFishController::class, 'perDayView'])->name('matchFishDayView');
Route::post('/matchFish/perDay/cari', [App\Http\Controllers\MatchFishController::class, 'avePerDay'])->name('matchFishPerDay');
// ? AveragePerWeek
Route::get('/matchFish/perWeek', [App\Http\Controllers\MatchFishController::class, 'perWeekView'])->name('matchFishWeekView');
Route::post('/matchFish/perWeek/cari', [App\Http\Controllers\MatchFishController::class, 'avePerWeek'])->name('matchFishPerWeek');
// ? AveragePerYear
Route::get('/matchFish/perYear', [App\Http\Controllers\MatchFishController::class, 'perYearView'])->name('matchFishYearView');
Route::post('/matchFish/perYear/cari', [App\Http\Controllers\MatchFishController::class, 'avePerYear'])->name('matchFishPerYear');
// ? ImportCSVExcel
Route::post('/matchFish/import_csv', [App\Http\Controllers\MatchFishController::class, 'import_csv'])->name('matchFish_importcsv');
Route::post('/matchFish/import_excel', [App\Http\Controllers\MatchFishController::class, 'import_excel'])->name('matchFish_importexcel');

