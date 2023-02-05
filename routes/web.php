<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/register', [ContactController::class, 'register'])->name('register');

Route::prefix('find')->group(function () {
    Route::get('/', [SearchController::class, 'index']);
    Route::post('/search',[SearchController::class, 'search'])->name('find.search');
    Route::get('/search', [SearchController::class, 'search']);
    Route::post('/delete', [SearchController::class, 'delete'])->name('find.delete');
});