<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\HopitalController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\CandidatureController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {

    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'hopital') {
        return redirect()->route('hopital.dashboard');
    }

    if ($user->role === 'medecin') {
        return redirect()->route('medecin.dashboard');
    }

    return redirect('/');

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // =========================
    // PROFILE
    // =========================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

   Route::get('/notifications', function () {

    $user = auth()->user();

    // Marquer les notifications comme lues
    $user->unreadNotifications->markAsRead();

    // Récupérer les notifications après les avoir marquées comme lues
    $notifications = $user->notifications;

    return view('notifications.index', compact('notifications'));

})->name('notifications.index');
    // =========================
    // ADMIN
    // =========================

    Route::middleware('role:admin')->group(function () {

        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        Route::resource('/admin/users', AdminController::class)
            ->names('admin.users')
            ->only([
                'index',
                'show',
                'edit',
                'update',
                'destroy'
            ]);

        Route::resource('/admin/specialites', SpecialiteController::class)
            ->names('specialites');
    });


    // =========================
    // HOPITAL
    // =========================

    Route::middleware('role:hopital')->group(function () {

        Route::get('/hopital/dashboard', [HopitalController::class, 'dashboard'])
            ->name('hopital.dashboard');

        Route::resource('/missions', MissionController::class)
            ->names('missions');

        Route::get('/hopital/candidatures', [CandidatureController::class, 'hopitalIndex'])
            ->name('hopital.candidatures.index');

        Route::patch('/hopital/candidatures/{candidature}/statut', [CandidatureController::class, 'updateStatut'])
            ->name('hopital.candidatures.statut');

        Route::get('/hopital/profile', [HopitalController::class, 'edit'])
    ->name('hopital.profile.edit');

Route::put('/hopital/profile', [HopitalController::class, 'update'])
    ->name('hopital.profile.update');    
    });


    // =========================
    // MEDECIN
    // =========================

    Route::middleware('role:medecin')->group(function () {

        Route::get('/medecin/dashboard', [MedecinController::class, 'dashboard'])
            ->name('medecin.dashboard');

        // Profil médecin
        Route::get('/medecin/profile', [MedecinController::class, 'edit'])
            ->name('medecin.profile.edit');

        Route::put('/medecin/profile', [MedecinController::class, 'update'])
            ->name('medecin.profile.update');

        // Missions disponibles
        Route::get('/medecin/missions', [MissionController::class, 'disponibles'])
            ->name('medecin.missions.index');

        Route::get('/medecin/missions/{mission}', [MissionController::class, 'medecinShow'])
            ->name('medecin.missions.show');

        // Candidatures
        Route::resource('/candidatures', CandidatureController::class)
            ->names('candidatures');
    });

});


require __DIR__.'/auth.php';