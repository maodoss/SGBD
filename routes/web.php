<?php

use App\Http\Controllers\CandidatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UtilisateurDges;
use App\Http\Controllers\PeriodeParrainageController;
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
Route::get('/Inscription2', [PostController::class, 'Inscription2'])->name('Inscription2');
Route::get('/Inscription3', [PostController::class, 'Inscription3'])->name('Inscription3');

// Route protégée pour le tableau de bord candidat
Route::get('/dash_candidat', [PostController::class, 'dash_candidat'])
    ->name('dash_candidat')
    ->middleware('candidat');

Route::get('/periode_parrainage', [PostController::class, 'periode_parrainage'])->name('periode_parrainage');
Route::get('/affiche_periode', [PeriodeParrainageController::class, 'affiche_periode'])->name('affiche_periode');

//Parainage d'un candidat
Route::get('Parrainage', [PostController::class, 'Parrainage'])->name('Parrainage');
// Route::post('verification_parrain', [PostController::class, 'verification_parrain'])->name('verification_parrain');

// Route::get('Parrainage2', [PostController::class, 'Parrainage2'])->name('Parrainage2');
Route::get('ListeCandidatElec/{id}', [PostController::class, 'ListeCandidatElec'])->name('ListeCandidatElec');
Route::post('/vote/{id}', [PostController::class, 'vote'])->name('vote');
// Route::get('Parrainage3', [PostController::class, 'Parrainage3'])->name('Parrainage3');
Route::get('dash_electeur', [PostController::class, 'dash_electeur'])->name('dash_electeur');


// Route::post('/verifcode', [Candidats::class, 'verifcode'])->name('verifcode');

//Route pour l'upload de fichier electorale et son traitement 
Route::get('Upload', [UtilisateurDges::class, 'Upload'])->name('Upload');
Route::post('traitement_upload', [UtilisateurDges::class, 'traitement_upload'])->name('traitement_upload');


//Utilisateur Dge  UtilisateurDges
Route::middleware(['dge'])->group(function () {
    Route::get('/dashdge', [UtilisateurDges::class, 'dashdge'])->name('dashdge');
    Route::get('/Upload', [UtilisateurDges::class, 'Upload'])->name('Upload');
    Route::post('/traitement_upload', [UtilisateurDges::class, 'traitement_upload'])->name('traitement_upload');
    Route::get('/Verif_electeur', [UtilisateurDges::class, 'Verif_electeur'])->name('Verif_electeur');
    Route::post('/Verif_traitement', [UtilisateurDges::class, 'Verif_traitement'])->name('Verif_traitement');
    Route::post('/candidats/{id}/regenerate-code', [UtilisateurDges::class, 'regenerateCode'])->name('candidats.regenerate');
    Route::get('/Liste_candidat', [UtilisateurDges::class, 'Liste_candidat'])->name('Liste_candidat');
    Route::get('/details_candidat', [UtilisateurDges::class, 'details_candidat'])->name('details_candidat');
});

// Routes publiques (login/logout)
Route::get('/AdminLogin', [UtilisateurDges::class, 'AdminLogin'])->name('AdminLogin');
Route::post('/traitement_login', [UtilisateurDges::class, 'traitement_login'])->name('traitement_login');
Route::get('/logout', [UtilisateurDges::class, 'logout'])->name('logout');

// Période de parrainage
Route::post('/periode-parrainage', [PeriodeParrainageController::class, 'setPeriode'])->name('periode.store');




// Route::get('saisie_candidat', [UtilisateurDges::class, 'saisie_candidat'])->name('saisie_candidat');
Route::post('traitement_saisie_candidat', [UtilisateurDges::class, 'traitement_saisie_candidat'])->name('traitement_saisie_candidat');


//electeur
Route::post('/verification', [CandidatController::class, 'verification'])->name('verification');
Route::post('/sendmail', [CandidatController::class, 'sendmail'])->name('sendmail');
Route::post('/verifcode', [CandidatController::class, 'verifcode'])->name('verifcode');

// Route::get('parrainer', [Candidats::class, 'parrainer'])->name('parrainer');



//traitement login candidat
Route::post('/traitement_login_candidat', [CandidatController::class, 'traitement_login_candidat'])->name('traitement_login_candidat');

// Parrainage
// Route::post('/parrainer', [ParrainageController::class, 'store'])->name('parrainer');
Route::post('verification_parrain', [CandidatController::class, 'verification_parrain'])->name('verification_parrain');

Route::get('Parrainage2', [CandidatController::class, 'Parrainage2'])->name('Parrainage2');

Route::get('/parrainage3', [CandidatController::class, 'showParrainage3'])->name('parrainage3');
Route::post('/parrainage3', [CandidatController::class, 'parrainage3']);
Route::post('/confirmer-vote', [CandidatController::class, 'confirmerVote']);

Route::get('/candidat/logout', [CandidatController::class, 'logout'])->name('candidat.logout');

Route::get('View_candidats', [CandidatController::class, 'View_candidats'])->name('View_candidats');
Route::get('afficher_periode', [CandidatController::class, 'afficher_periode'])->name('afficher_periode');
