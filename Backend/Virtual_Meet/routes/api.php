<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\AdminApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/profile', [UserApiController::class, 'profile']);
Route::post('/login',[LoginAPIController::class,'login']);
Route::post('/logout',[LoginAPIController::class,'logout']);
Route::post('/registration',[LoginAPIController::class,'registration']);

Route::post('/addTeam',[UserAPIController::class,'addTeam']);
Route::post('/profile/update',[UserAPIController::class,'profileEdit']);
Route::post('/verify',[LoginAPIController::class,'verify']);
Route::get('/user/list', [AdminApiController::class, 'userList']);

Route::get('/user/list/teams', [UserApiController::class, 'teamList']);
Route::delete('/team/delete/{id}', [UserApiController::class, 'deleteTeam']);

Route::delete('/users/delete/{id}', [AdminApiController::class, 'deleteUser']);
Route::get('/users/edit/{id}', [AdminApiController::class, 'editUser']);

Route::get('/users/list/teams/all', [AdminApiController::class, 'teamList']);
