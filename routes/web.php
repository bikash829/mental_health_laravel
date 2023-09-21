<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login/',function (){
    return view('auth.login');
})->name('login');

//Route::get('test/', function () {
//    return 'Test Route';
//})->name('test');

Route::get('test/',function (){
    return view('pages.test');
})->name('test');

// App routes

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




