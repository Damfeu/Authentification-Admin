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

// // Route pour traiter les informations de connexion
// Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login.post');

// // Route pour afficher le tableau de bord (ajoutez cette route si ce n'est pas déjà fait)
// Route::get('auth/dashboard', [UserController::class, 'index'])->name('auth.dashboard');

// // Route pour la déconnexion
// Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');








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



