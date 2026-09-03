<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {

    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'client') {
        return redirect()->route('client.dashboard');
    }

    if ($user->role === 'freelance') {
        return redirect()->route('freelance.dashboard');
    }

    return redirect('/');

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // Admin Dashboard
    // Admin
Route::middleware('role:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/users', AdminUserController::class)
    ->names('admin.users')
    ->only([
        'index',
        'show',
        'edit',
        'update',
        'destroy'
    ]);
});

    // Client Dashboard
    Route::middleware('role:client')->group(function () {
        Route::get('/client/dashboard', function () {
            return view('client.dashboard');
        })->name('client.dashboard');
    });


    // Freelance Dashboard
    Route::middleware('role:freelance')->group(function () {
        Route::get('/freelance/dashboard', function () {
            return view('freelance.dashboard');
        })->name('freelance.dashboard');
    });

});


require __DIR__.'/auth.php';

