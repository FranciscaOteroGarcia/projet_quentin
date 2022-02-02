<?php

use App\Http\Controllers\MagasinController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!cle
|
*/

Route::get('/', function () {
    return view('layout');
});


Route::resource('/magasin', MagasinController::class);
Route::resource('/marque', MarqueController::class);
Route::resource('/voiture', VoitureController::class);

