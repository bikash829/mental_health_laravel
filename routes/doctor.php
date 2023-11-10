<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DoctorController;
use App\Http\Controllers\PostController;

Route::group(['prefix'=>'doctor','name'=>'doctor','as'=>'doctor.'],function (){
    Route::resource('profile',UserController::class);


    Route::get('/dashboard/',[DoctorController::class,'show_dashboard'])->name('dashboard');
    Route::get('/profile_view/',[DoctorController::class,'show_profile'])->name('profile');
    Route::get('/profile_view/fillup_form/',[DoctorController::class,'doctor_profile_wizard_step'])->name('doctor_form');
    Route::post('/profile_view/fillup_form/delete_education',[UserController::class,'delete_education'])->name('delete_education');
    Route::post('/profile_view/fillup_form/delete_training/',[UserController::class,'delete_training'])->name('delete_training');
    Route::post('/profile_view/fillup_form/delete_experience/',[UserController::class,'delete_experience'])->name('delete_experience');


    // community forum
    Route::resource('community',PostController::class);
    Route::post('/community/post/comment/',[PostController::class,'store_comment'])->name('store_comment');
    // Route::get('/community_forum/',[PostController::class,'show_community_forum'])->name('community_forum');
    // Route::post('/create-post/',[DoctorController::class,'create_post'])->name('create_post');



});
