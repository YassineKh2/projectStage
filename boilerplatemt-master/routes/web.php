<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessionalExperienceController;
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
	return view('auth.login');
});

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::resource('/roles', RoleController::class);
Route::post('/destroy/{id}', [RoleController::class, 'destroy'])->name('destroy');
Route::get('roledatatable/getdata', 'App\Http\Controllers\RoleController@getRoles')->name('roledatatable/getdata');

Route::resource('/permissions', PermissionController::class);

Route::resource('/apps', AppController::class);
Route::get('appdatatable/getdata', 'App\Http\Controllers\AppController@getApps')->name('appdatatable/getdata');

Route::resource('/users', UserController::class);
Route::get('userdatatable/getdata', 'App\Http\Controllers\UserController@getUsers')->name('userdatatable/getdata');

Route::resource('/settings', SettingController::class);
Route::get('/profil/edit', [UserController::class, 'profil'])->name('profil');

Route::post('/updatepassword', [ProfilController::class, 'updatepassword'])->name('updatepassword');
Route::post('/updateprofil', [ProfilController::class, 'updateprofil'])->name('updateprofil');

Route::resource('/resume', ResumeController::class);
Route::get('resumedatatable/getdata', 'App\Http\Controllers\ResumeController@getResume')->name('resumedatatable/getdata');
//Route::get('/resume/update/{id}/{id2}', 'App\Http\Controllers\ResumeController@update')->name('/resume/update/{id}/{id2}');

Route::resource('/resume/ProfessionalExperience', ProfessionalExperienceController::class);


