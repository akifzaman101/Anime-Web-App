<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('home.login');
// });
// Route::get('/registration', function () {
//     return view('home.registration');
// });
//Route::get('/login','PagesSontroller@login');

//view
//--------------------------------------------------------------------------------------------------
Route::get('/index',[UserController::class,'index'])->name('home');
Route::get('/',[UserController::class,'login'])->name('login');
Route::get('/registration',[UserController::class,'registration'])->name('registration');

//Reg_login
//--------------------------------------------------------------------------------------------------
Route::post('/registration',[UserController::class,'registrationsubmit'])->name('registration.submit');
Route::post('/login',[UserController::class,'loginsubmit'])->name('login.submit');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

//AboutUs
//--------------------------------------------------------------------------------------------------
Route::get('/aboutus',[UserController::class,'aboutus'])->name('aboutus');
Route::get('/contactus',[UserController::class,'contactus'])->name('contactus');

//Series
//--------------------------------------------------------------------------------------------------
Route::get('/series/create',[SeriesController::class,'create']);
Route::get('/series/edit',[SeriesController::class,'edit']);
Route::get('/series/get/{id}',[SeriesController::class,'get'])->name('series.details');
Route::get('/list',[SeriesController::class,'list'])->name('series.list');
Route::get("/search", [SeriesController::class,'search'])->name('search');
Route::get('/series/upload',[SeriesController::class,'series_upload'])->name('upload');
Route::get('/series/exisitingWebseriesEpisode',[SeriesController::class,'exist_episode'])->name('ex_ep_upload');
Route::post('/series/episdeUpload',[SeriesController::class,'ep_upload'])->name('ep_upload');
Route::get('/series/seriesUpload',[SeriesController::class,'s_upload'])->name('series_upload');
Route::post('/series/SeriesUpload',[SeriesController::class,'ser_upload'])->name('ser.upload');
Route::get('/episode/get/{id}',[SeriesController::class,'get_ep'])->name('episode.details');
//User
//--------------------------------------------------------------------------------------------------
Route::get('/user/get/{id}',[UserController::class,'get'])->name('user.details');

Route::get('/user/edit/{id}',[UserController::class,'get_user'])->name('user_profile_edit');
Route::post("/user/update",[UserController::class,'user_update'])->name('user.update');

//Admin
//--------------------------------------------------------------------------------------------------
Route::get("/admin/viewallusers",[AdminController::class,'all_users'])->name('all_users');
Route::get("/admin/user/details/{id}",[AdminController::class,'user_details'])->name('user_details');
Route::get("/admin/user/delete/{id}",[AdminController::class,'user_delete'])->name('user_delete');
Route::get("/admin/user/Edit/{id}",[AdminController::class,'user_edit'])->name('user_edit');
Route::post("/admin/user/update",[AdminController::class,'user_update'])->name('user_update');

