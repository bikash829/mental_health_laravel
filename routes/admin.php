<?php


// Doctor Routes
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['auth','role:Admin'],'prefix'=>'admin','name'=>'admin','as'=>'admin.'],function (){
//    Route::get('profile/',[HomeController::class, 'index'])->name('dashboard');
    Route::resource('dashboard/',UserController::class);

});
