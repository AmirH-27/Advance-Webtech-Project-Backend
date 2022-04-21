<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.login.login');
});

//----------------------------Login&Registration----------------------------//
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login');

Route::get('/registration', [LoginController::class, 'registration']);
Route::post('/registration', [LoginController::class, 'registrationSubmit'])->name('registration');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//----------------------------User----------------------------//
Route::get('/home/user', [UserController::class, 'home'])->name('homeUser');
Route::get('/profile/user', [UserController::class, 'profile'])->name('profileUser')->middleware('ValidUser')->middleware('VerifyUser');
Route::post('/profile/user/edit', [UserController::class, 'profileEdit'])->name('profileUserEdit');
Route::get('/user/meeting/list', [UserController::class, 'meetingList'])->name('meetingListUser')->middleware('ValidUser');
Route::get('/user/meeting', [UserController::class, 'meeting'])->name('meeting');

//----------------------------Admin----------------------------//
Route::get('/home/admin', [AdminController::class, 'home'])->name('homeAdmin');
Route::get('/profile/admin', [AdminController::class, 'profile'])->name('profileAdmin')->middleware('ValidUser');
Route::post('/profile/admin/edit', [AdminController::class, 'profileEdit'])->name('profileAdminEdit');

Route::get('/admin/user/list', [AdminController::class, 'userList'])->name('userList')->middleware('ValidUser');
Route::get('/admin/meeting/list', [AdminController::class, 'meetingList'])->name('meetingList')->middleware('ValidUser');

Route::get('/admin/addUser', [AdminController::class, 'addUser'])->middleware('ValidUser');
Route::get('/admin/editUser/{id}', [AdminController::class, 'editUser']);
Route::get('/admin/deleteUser/{id}', [AdminController::class, 'deleteUser']);

Route::post('/admin/addUser', [AdminController::class, 'addUserSubmit'])->name('addUser');
Route::post('/admin/editUser', [AdminController::class, 'editUserSubmit'])->name('editUser');
Route::post('/admin/deleteUser', [AdminController::class, 'deleteUserSubmit'])->name('deleteUser');

Route::get('/user/createteam', [TeamController::class, 'createTeam']);
Route::post('/user/createteam', [TeamController::class, 'createTeamSubmit'])->name('createTeam');

Route::get('/user/{name}', [TeamController::class, 'viewTeam']);
Route::get('/user/verify', [LoginController::class, 'otpCheck']);
Route::post('/user/verify', [LoginController::class, 'otpCheckSubmit'])->name('otpSubmit');


