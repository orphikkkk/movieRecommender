<?php

use App\Http\Controllers\MoviesController;
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

Route::get('/',[MoviesController::class,'main'])->name('main');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('movies',[MoviesController::class,'index'])->name('movies');
    Route::get('movies/create',[MoviesController::class,'create'])->name('movies.create');
    Route::post('movies/store',[MoviesController::class,'store'])->name('movies.store');
    Route::get('movies/edit/{id}',[MoviesController::class,'edit'])->name('movies.edit');
    Route::post('movies/update',[MoviesController::class,'update'])->name('movies.update');
    Route::get('movies/unfavourite/{id}',[MoviesController::class,'unfavourite'])->name('movies.unfavourite');
    Route::get('movies/favourite/{id}',[MoviesController::class,'favourite'])->name('movies.favourite');
//    Route::view('movies','movies')->name('movies');
});


require __DIR__.'/auth.php';
