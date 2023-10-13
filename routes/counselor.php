<?php

use App\Http\Controllers\CounselorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'counselor','name'=>'counselor','as'=>'counselor.'],function (){
    Route::resource('profile',UserController::class);

    Route::get('/dashboard/',[CounselorController::class,'show_dashboard'])->name('dashboard');
    Route::get('/profile_view/',[CounselorController::class,'show_profile'])->name('profile');
    Route::get('/profile_view/fillup_form/',[CounselorController::class,'counselor_profile_wizard_step'])->name('counselor_form');
});
