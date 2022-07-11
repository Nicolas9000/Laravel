<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\IndexController;
use App\Models\Annonce;
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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [IndexController::class, 'update'])->name('profile.update');
    Route::delete('profile', [IndexController::class, 'delete'])->name('profile.delete');
});

Route::controller(AnnonceController::class)->group(function(){

    Route::get('annonce', 'AllAnnonce')->name('annonce');
    Route::get('/add-annonce', 'create')->name('add-annonce');
    Route::post('/add-annonce', 'add');
    Route::get('/edit-annonce/{annonce_id}', 'edit');
    Route::put('/update-annonce/{annonce_id}', 'update');
    Route::delete('/delete-annonce/{annonce_id}', 'delete');

    Route::get('/search-annonce', 'SearchAnnonce')->name('search-annonce');


});



require __DIR__.'/auth.php';
