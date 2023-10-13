<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DoctorController;
Route::group(['prefix'=>'doctor','name'=>'doctor','as'=>'doctor.'],function (){
    Route::resource('profile',UserController::class);


    Route::get('/dashboard/',[DoctorController::class,'show_dashboard'])->name('dashboard');
    Route::get('/profile_view/',[DoctorController::class,'show_profile'])->name('profile');
    Route::get('/profile_view/fillup_form/',[DoctorController::class,'doctor_profile_wizard_step'])->name('doctor_form');

});
