<?php


// Doctor Routes
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','name'=>'admin','as'=>'admin.'],function (){
    Route::resource('profile',UserController::class);

    Route::get('/dashboard/',[AdminController::class,'show_dashboard'])->name('dashboard');
    Route::get('/profile_view/',[AdminController::class,'show_profile'])->name('profile');

});
