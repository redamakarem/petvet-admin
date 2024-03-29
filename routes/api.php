<?php

use App\Http\Controllers\Api\V1\Admin\MedicalHistoryApiController;
use App\Http\Controllers\Api\V1\Admin\MessageApiController;
use App\Http\Controllers\Api\V1\Admin\PermissionApiController;
use App\Http\Controllers\Api\V1\Admin\PetApiController;
use App\Http\Controllers\Api\V1\Admin\PetGenderApiController;
use App\Http\Controllers\Api\V1\Admin\PettypeApiController;
use App\Http\Controllers\Api\V1\Admin\RoleApiController;
use App\Http\Controllers\Api\V1\Admin\SubsriptionApiController;
use App\Http\Controllers\Api\V1\Admin\TodoApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;
use App\Http\Controllers\Api\V1\Admin\VetLocationApiController;
use App\Http\Controllers\Api\V1\Admin\VetProffesionApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', PermissionApiController::class);

    // Roles
    Route::apiResource('roles', RoleApiController::class);

    // Users
    Route::get('/myInfo', [UserApiController::class, 'myInfo'])->name('users.myInfo');
    Route::post('users/media', [UserApiController::class, 'storeMedia'])->name('users.store_media');
    Route::apiResource('users', UserApiController::class);

    // Pet
    Route::get('allPets',[PetApiController::class,'allPets']);
    Route::post('pets/media', [PetApiController::class, 'storeMedia'])->name('pets.store_media');
    Route::apiResource('pets', PetApiController::class);

    // Pettype
    Route::apiResource('pettypes', PettypeApiController::class);

    // Pet Gender
    Route::apiResource('pet-genders', PetGenderApiController::class);

    // Vet Proffesion
    Route::apiResource('vet-proffesions', VetProffesionApiController::class);

    // Vet Location
    Route::apiResource('vet-locations', VetLocationApiController::class);

    // Medical History
    Route::apiResource('medical-histories', MedicalHistoryApiController::class);

    // Todo
    Route::apiResource('todos', TodoApiController::class);

    // Message
    Route::apiResource('messages', MessageApiController::class);

    // Subsriptions
    Route::apiResource('subsriptions', SubsriptionApiController::class);


    Route::get('/vets',[UserApiController::class,'getVets']);

    Route::post('/logout',[\App\Http\Controllers\Auth\AuthAuthController::class,'logout']);
});


Route::group(['prefix' => 'v1', 'as' => 'api.'],function (){
    Route::post('/login',[\App\Http\Controllers\Auth\AuthAuthController::class,'login']);
    Route::post('/register',[\App\Http\Controllers\Auth\AuthAuthController::class,'register']);



    Route::get('vet-proffessions',[VetProffesionApiController::class,'getList']);
});
