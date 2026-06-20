<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\DoubleurController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonArgentController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonneurController;
use App\Http\Controllers\AdminController;

Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::get('/faq', [DoubleurController::class, 'faq'])->name('faq');
Route::get('/conditions', [DoubleurController::class, 'conditions'])->name('conditions');
Route::get('/comment-ca-marche', [DoubleurController::class, 'comment_ca_marche'])->name('comment.ca.marche');
Route::get('/qui-sommes-nous', [DoubleurController::class, 'qui_sommes_nous'])->name('qui.sommes.nous');
Route::get('/nos-activites', [DoubleurController::class, 'nos_activites'])->name('nos.activites');
Route::get('/centres', [DoubleurController::class, 'centres'])->name('centres');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'envoyer'])->name('contact.envoyer');

Route::get('/don-argent', [DonArgentController::class, 'index'])->name('don.argent');
Route::post('/don-argent', [DonArgentController::class, 'envoyer'])->name('don.argent.envoyer');

Route::get('/questionnaire', [QuestionnaireController::class, 'index'])->name('questionnaire');
Route::post('/questionnaire', [QuestionnaireController::class, 'verifier'])->name('questionnaire.verifier');

Route::get('/login', [AuthController::class, 'login_form'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/inscription', [AuthController::class, 'inscription_form'])->name('inscription');
Route::post('/inscription', [AuthController::class, 'inscription'])->name('inscription.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('donneur')->name('donneur.')->group(function () {
    Route::get('/dashboard', [DonneurController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil', [DonneurController::class, 'profil'])->name('profil');
    Route::post('/profil', [DonneurController::class, 'modifier_profil'])->name('profil.modifier');
    Route::get('/historique', [DonneurController::class, 'historique'])->name('historique');
    Route::get('/badges', [DonneurController::class, 'badges'])->name('badges');
    Route::get('/carte', [DonneurController::class, 'carte'])->name('carte');
    Route::get('/notifications', [DonneurController::class, 'notifications'])->name('notifications');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/donneurs', [AdminController::class, 'donneurs'])->name('donneurs');
    Route::get('/donneurs/{id}', [AdminController::class, 'donneur_show'])->name('donneurs.show');
    Route::delete('/donneurs/{id}', [AdminController::class, 'donneur_destroy'])->name('donneurs.destroy');

    Route::get('/dons', [AdminController::class, 'dons'])->name('dons');
    Route::post('/dons/{id}/valider', [AdminController::class, 'don_valider'])->name('dons.valider');

    Route::get('/centres', [AdminController::class, 'centres'])->name('centres');
    Route::post('/centres', [AdminController::class, 'centre_store'])->name('centres.store');
    Route::delete('/centres/{id}', [AdminController::class, 'centre_destroy'])->name('centres.destroy');

    Route::get('/actualites', [AdminController::class, 'actualites'])->name('actualites');
    Route::post('/actualites', [AdminController::class, 'actualite_store'])->name('actualites.store');
    Route::delete('/actualites/{id}', [AdminController::class, 'actualite_destroy'])->name('actualites.destroy');

    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');

    Route::get('/utilisateurs', [AdminController::class, 'utilisateurs'])->name('utilisateurs');
    Route::post('/utilisateurs/{id}/role', [AdminController::class, 'utilisateur_changer_role'])->name('utilisateurs.role');
});
