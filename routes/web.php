<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MedicalHistoryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\PetGenderController;
use App\Http\Controllers\Admin\PettypeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TodoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VetLocationController;
use App\Http\Controllers\Admin\VetProffesionController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::post('users/media', [UserController::class, 'storeMedia'])->name('users.storeMedia');
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Pet
    Route::post('pets/media', [PetController::class, 'storeMedia'])->name('pets.storeMedia');
    Route::resource('pets', PetController::class, ['except' => ['store', 'update', 'destroy']]);

    // Pettype
    Route::resource('pettypes', PettypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Pet Gender
    Route::resource('pet-genders', PetGenderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Vet Proffesion
    Route::resource('vet-proffesions', VetProffesionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Vet Location
    Route::resource('vet-locations', VetLocationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Medical History
    Route::resource('medical-histories', MedicalHistoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Todo
    Route::resource('todos', TodoController::class, ['except' => ['store', 'update', 'destroy']]);

    // Message
    Route::resource('messages', MessageController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
