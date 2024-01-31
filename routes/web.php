<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PatientController::class,"home"]);
Route::get('/register',[LoginController::class,"show_register"])->name('register');
Route::post('/store',[LoginController::class,"register"])->name('store');
Route::get('/loginform',[LoginController::class,"loginform"])->name('loginform');
Route::get('/redirct',[LoginController::class,"redirct"])->name('redirct');
Route::post('/login',[LoginController::class,"login"])->name('login');
Route::get('/logout',[LoginController::class,"logout"])->name('logout');
Route::get('/home',[PatientController::class,"home"])->name('home');



// pateint
Route::group(['middleware'=>'user'],function(){
Route::post('/appointment',[PatientController::class,"make_appointment"])->name('appointment');
Route::get('/info',[PatientController::class,"show"])->name('info');
Route::post('/contactus',[PatientController::class,"contactus"])->name('contactus');
});

// admin
Route::group(['middleware'=>'admin'],function(){
Route::get('/dashboard',[AdminController::class,"dashboard"])->name('dashboard');
Route::get('/doctor/{id}',[AdminController::class,"deletedoctor"]);
Route::get('/message/{id}',[AdminController::class,"deletemessage"]);
Route::post('/add_doctor',[AdminController::class,"add_doctor"]);
});

// doctor
Route::middleware(['doctor'])->group(function(){
Route::get('/doctorview',[DoctorController::class,"doctorview"]);
Route::get('appointment/{id}',[DoctorController::class,"delete_appointment"]);
Route::post('prescription',[DoctorController::class,"prescriptionform"]);
Route::get('prescription',[DoctorController::class,"form"]);
Route::post('/adddrug',[DoctorController::class,"adddrug"]);
Route::post('make',[DoctorController::class,"make"]);
Route::get('/deletedrug/{key}',[DoctorController::class,"deletedrug"]);
});




