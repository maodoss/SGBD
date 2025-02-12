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


//Declaration de la route acceuil
Route::get('/', [PostController::class, 'Acceuil'])->name('Acceuil');
//Route qui gere l'inscription et la connexion des electeurs 
Route::get('/login', [PostController::class, 'login'])->name('login');
Route::get('/inscription', [PostController::class, 'inscription'])->name('inscription');


//Route pour l'upload de fichier electorale et son traitement 
Route::get('Upload', [PostController::class, 'Upload'])->name('Upload');
Route::get('traitement_upload', [PostController::class, 'traitement_upload'])->name('traitement_upload');
