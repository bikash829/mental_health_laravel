<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PatientController;
use \App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;

Route::group(['prefix'=>'patient','name'=>'patient','as'=>'patient.'],function (){
    Route::resource('profile',UserController::class);

    Route::get('/profile_view/',[PatientController::class,'show_profile'])->name('profile');

    //edit profile
    Route::get('/edit_basic_info/',[PatientController::class,'edit_basic_info'])->name('edit_basic_info');
    Route::get('/edit_address/',[PatientController::class,'edit_address'])->name('edit_address');
    Route::get('/edit_contact/',[PatientController::class,'edit_contact'])->name('edit_contact_info');
    Route::post('/change_email/',[UserController::class,'change_email'])->name('change_email');

    Route::resource('community',PostController::class);
    Route::post('/community/comment/',[PostController::class,'store_comment'])->name('store_comment');
//    Route::get('/edit_medical_info/',[PatientController::class,'edit_medical_info'])->name('edit_medical_info');
//    Route::get('/edit_contact/',[PatientController::class,'edit_contact'])->name('edit_contact_info');


    // show specialist profile info
    Route::get('/specialist_profile/{user_id}',[PatientController::class,'show_user_profile'])->name('show_user_profile');
});
