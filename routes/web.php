<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});
//Declaration de la route acceuil
Route::get('Acceuil', [PostController::class, 'Acceuil'])->name('Acceuil');

Route::get('Upload', [PostController::class, 'Upload'])->name('Upload');
