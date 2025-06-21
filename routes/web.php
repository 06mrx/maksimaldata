<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TrainingScheduleController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\TrainingTypeController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\SettingController;


// Route::get('/', function () {
//     return view('homepage.index');
// });

Route::get('/', [HomePageController::class, 'index'])->name('homepage');

// Route::get('/dashboard', function () {
//     // dd('dasg');
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {
    // Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboards');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('training-schedules', TrainingScheduleController::class);
    Route::resource('participants', ParticipantController::class);
    Route::resource('training-types', TrainingTypeController::class)->names('training-types');
    Route::resource('facilities', FacilityController::class)->names('facilities');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');
    
});

Route::get('/registration/form', [RegistrationController::class, 'showForm'])->name('register.form');
Route::post('/registration/submit', [RegistrationController::class, 'submitForm'])->name('register.submit');

require __DIR__.'/auth.php';
