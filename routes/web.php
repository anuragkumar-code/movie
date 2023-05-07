<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OmdbController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/sign-up',[UserController::class,'registerView'])->name('registerView');
Route::get('/sign-in',[UserController::class,'signinView'])->name('signinView');

Route::post('/registered',[UserController::class,'registered'])->name('registerForm');
Route::post('/signedIn',[UserController::class,'signedIn'])->name('signedIn');


Route::get('/', [OmdbController::class, 'testapi'])->name('testapi');

Route::group(['middleware' => ['MovieUser']], function(){

    Route::get('dashboard', [OmdbController::class, 'dashboardView'])->name('dashboard');
    Route::get('favourite', [OmdbController::class, 'favourite'])->name('favourite');
    Route::post('/search', [OmdbController::class, 'searchMovie'])->name('searchMovie');

    Route::get('/movie-detail/{id}', [OmdbController::class, 'viewDetail'])->name('viewDetail');


    Route::post('/setFav', [OmdbController::class, 'setFav'])->name('setFav');
    Route::post('/delete', [OmdbController::class, 'delete'])->name('delete');


    Route::get('logout', [UserController::class, 'logout'])->name('logout');

});
