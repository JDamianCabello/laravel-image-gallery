<?php

use App\Http\Controllers\ImageController;
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
    return redirect()->action([ImageController::class, 'index']);
});



Route::controller(ImageController::class)->prefix('/gallery')->group(function () {
    Route::get('', 'index');
    Route::get('/{id}', 'seeInfo');
    Route::post('', 'upload');
    Route::delete('/{id}', 'destroy');
    Route::put('/{id}', 'update')->name('image.update');
});

