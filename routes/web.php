<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();


Route::get('test/',function (){
    return view('pages.test');
})->name('test');

//================================================ App routes

Route::get('/',function (){
    $data = ['home'=>'active',];
    return view('pages.index',$data);
})->name('home');

Route::get('doctor&counselor/',function (){
    $data = ['doctor_counselor'=>'active',];
    return view('pages.doctor_counselor',$data);
})->name('doctor_counselor');

Route::get('community-forum/',function (){
    $data = ['community'=>'active',];
    return view('pages.community',$data);
})->name('community');

Route::get('about-us/',function (){
    $data = ['about'=>'active',];
    return view('pages.about',$data);
})->name('about');

Route::get('contact-us/',function (){
    $data = ['contact'=>'active',];
    return view('pages.contact',$data);
})->name('contact');

//===================================== Contact Us Page
Route::post('message/',[\App\Http\Controllers\ContactUsController::class,'store'])->name('send_query');


// ====================================error page route ..
Route::get('error404/',function (){
   return view('error.error.php');
})->name('error404');


//========================================external routes


// =========================patient


//==========================doctor


//==========================counselor



//=========================admin


