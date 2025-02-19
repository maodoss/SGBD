<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UtilisateurDges;
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
Route::get('/dash_candidat', [PostController::class, 'dash_candidat'])->name('dash_candidat');
Route::get('/periode_parrainage', [PostController::class, 'periode_parrainage'])->name('periode_parrainage');

//Route pour l'upload de fichier electorale et son traitement 
Route::get('Upload', [UtilisateurDges::class, 'Upload'])->name('Upload');
Route::post('traitement_upload', [UtilisateurDges::class, 'traitement_upload'])->name('traitement_upload');


//Utilisateur Dge  UtilisateurDge
Route::get('/dashdge', [UtilisateurDges::class, 'dashdge'])->name('dashdge');
Route::get('/AdminLogin', [UtilisateurDges::class, 'AdminLogin'])->name('AdminLogin');
Route::post('/traitement_login', [UtilisateurDges::class, 'traitement_login'])->name('traitement_login');

Route::get('Verif_electeur', [UtilisateurDges::class, 'Verif_electeur'])->name('Verif_electeur');
Route::post('Verif_traitement', [UtilisateurDges::class, 'Verif_traitement'])->name('Verif_traitement');

Route::get('saisie_candidat', [UtilisateurDges::class, 'saisie_candidat'])->name('saisie_candidat');
Route::post('traitement_saisie_candidat', [UtilisateurDges::class, 'saisie_candidat'])->name('saisie_candidat');


//Liste_candidat
Route::get('Liste_candidat', [PostController::class, 'Liste_candidat'])->name('Liste_candidat');
Route::get('details_candidat', [PostController::class, 'details_candidat'])->name('details_candidat');

//Parainage d'un candidat
Route::get('Parrainage', [PostController::class, 'Parrainage'])->name('Parrainage');
