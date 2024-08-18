<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.LoginAdmin');
});


 Route::post('auth/dashboard', [AuthController::class, 'login'])->name('auth.dashboard');



// // Route pour afficher le formulaire de connexion
Route::get('auth/LoginAdmin', [AuthController::class, 'showLoginForm'])->name('auth.login');



Route::post('auth/register',[AuthController::class, 'register'])->name('auth.register');

Route::get('auth/register',[AuthController::class, 'showRegisterForm'])->name('auth.register');


// Route pour le tableau de bord
Route::get('auth/dashboard', [AuthController::class, 'showDashboard'])->name('auth.dashboard');

// Route pour éditer un utilisateur
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

// Route pour mettre à jour un utilisateur
Route::put('users/{id}', [UserController::class, 'update'])->name('user.update');

// Route pour supprimer un utilisateur
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Route pour la déconnexion
Route::post('auth/LoginAdmin', [AuthController::class, 'logout'])->name('auth.LoginAdmin');


Route::get('userDashboard', function () {
    return view('userDashboard');
})->name('userDashboard');








// // Route pour afficher la page de connexion
// Route::get('/', function () {
//     return view('auth.LoginAdmin');
// });

// // Route pour la connexion de l'administrateur et de l'utilisateur
// Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

// // Route pour afficher le formulaire de connexion
// Route::get('auth/LoginAdmin', [AuthController::class, 'showLoginForm'])->name('auth.login');

// // Route pour afficher le formulaire d'enregistrement
// Route::get('auth/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');

// // Route pour enregistrer un utilisateur
// Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');

// // Route pour le tableau de bord (sécurisée par auth middleware)
// Route::get('auth/dashboard', [AuthController::class, 'showDashboard'])->name('auth.dashboard')->middleware('auth');

// // Route pour éditer un utilisateur (sécurisée par auth middleware)
// Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');

// // Route pour mettre à jour un utilisateur (sécurisée par auth middleware)
// Route::put('users/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');

// // Route pour supprimer un utilisateur (sécurisée par auth middleware)
// Route::delete('users/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');

// // Route pour la déconnexion (sécurisée par auth middleware)
// Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

// // Route pour afficher le tableau de bord de l'utilisateur (sécurisée par auth middleware)
// Route::get('userDashboard', function () {
//     return view('userDashboard');
// })->name('userDashboard')->middleware('auth');
