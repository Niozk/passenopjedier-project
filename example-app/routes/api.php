<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PetSittingRequestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('users', UserController::class);
Route::post('/users/register', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);

Route::get('/pet-sitting-requests', [PetSittingRequestController::class, 'index']);
Route::get('/pet-sitting-requests/{id}', [PetSittingRequestController::class, 'show']);
Route::post('/pet-sitting-requests/post', [PetSittingRequestController::class, 'store']);


//images

Route::get('/uploads/profile-pictures/{filename}', function ($filename) {
    $path = public_path('uploads/profile-pictures/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
});

Route::get('/uploads/pet-sitting-request/{filename}', function ($filename) {
    $path = public_path('uploads/pet-sitting-request/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
});