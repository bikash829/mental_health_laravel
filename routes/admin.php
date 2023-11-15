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

});
