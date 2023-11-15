<?php


// Doctor Routes
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','name'=>'admin','as'=>'admin.'],function (){
    Route::resource('profile',UserController::class);

    Route::get('/dashboard/',[AdminController::class,'show_dashboard'])->name('dashboard');
    Route::get('/profile_view/',[AdminController::class,'show_profile'])->name('profile');



    // community forum
    Route::resource('community',PostController::class);
    Route::post('/community/post/comment/',[PostController::class,'store_comment'])->name('store_comment');
    Route::post('/communtiy/delete-post/',[PostController::class,'delete_post'])->name('delete_post');
    Route::post('/communtiy/post/delete-comment/',[PostController::class,'delete_comment'])->name('delete_comment');

    // Route::delete('/admin/community/{post}', [PostController::class,'store_comment'])->name('admin.community.destroy');


    //conatct us queries
    Route::get('/contact-us/',[AdminController::class,'show_contact_us'])->name('contact_us_queries');

    // pending_user
    Route::get('/pending-user/',[AdminController::class,'show_pending_user'])->name('pending_user');
    // blocked_user
    Route::get('/blocked-user/',[AdminController::class,'show_blocked_user'])->name('blocked_user');
    // doctor_list
    Route::get('/doctor-list/',[AdminController::class,'show_doctor_list'])->name('doctor_list');
    // counselor_list
    Route::get('/counselor-list/',[AdminController::class,'show_counselor_list'])->name('counselor_list');
    // patient_list
    Route::get('/patient-list/',[AdminController::class,'show_patient_list'])->name('patient_list');
    // all_users
    Route::get('/all-users/',[AdminController::class,'show_all_users'])->name('all_users');


    // verify_user
    Route::get('/verify-user/',[AdminController::class,'verify_user'])->name('verify_user');

    // block_user
    Route::get('/block-user/',[AdminController::class,'block_user'])->name('block_user');

});
