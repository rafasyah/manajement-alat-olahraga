<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Models\Alat;



// Homepage
Route::get('/', function () {
    $alats = Alat::all();
    return view('welcome', compact('alats'));
})->name('home');

// Borrow form (guests can also access)
Route::resource('form', FormController::class)->only(['create', 'store']);



Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [FormController::class, 'index'])
        ->middleware(['verified'])
        ->name('dashboard');

        Route::put('/form/{id}/approve', [FormController::class, 'approve'])->name('form.approve');
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manage alat (only logged-in users)
    Route::resource('alat', AlatController::class)->names('alat');

    // Other form actions (edit/update/destroy) restricted to logged-in users
    Route::resource('form', FormController::class)->except(['create', 'store']);
});

require __DIR__.'/auth.php';
