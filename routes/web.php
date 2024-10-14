<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

use App\Models\Events\ServiceCategory;
use App\Models\Events\Service;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;

use App\Http\Controllers\ServiceBooking;
use App\Http\Controllers\SslCommerzPaymentController;




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


Route::get('test/', function () {
    return view('pages.test');
})->name('test');


//================================================ App routes

Route::get('/', function () {
    $data = ['home' => 'active',];
    $doctorSchedule = App\Models\DoctorSchedule::where('status', 1)->get();
    return view('pages.index', compact('data', 'doctorSchedule'));
})->name('home');

Route::get('doctor&counselor/', function () {

    // $users  = User::where('is_verified', 1)->get();
    $users = User::role(['vendor']) // Using Spatie's role method
        ->where('is_verified', 1)
        ->where('is_active', 1)
        ->get();
    $doctorSchedule = App\Models\DoctorSchedule::where('status', 1)->get();


    $data = ['doctor_counselor' => 'active',];
    return view('pages.doctor_counselor', $data, compact('users', 'doctorSchedule'));
})->name('doctor_counselor');

Route::get('upcoming_appointments/', function () {
    $doctorSchedule = App\Models\DoctorSchedule::where('status', 1)->get();
    $data = ['doctor_counselor' => 'active',];
    return view('pages.upcoming_appointments', $data, compact('doctorSchedule'));
})->name('view_appointments');


Route::get('community-forum/', function () {
    $user = Auth::user();
    $posts = Post::with([
        'comments' => function ($query) {
            $query->orderBy('id', 'desc');
        }
    ])
        ->orderBy('id', 'desc')
        ->get();
    $data = ['community' => 'active',];

    return view('pages.community', $data, compact('posts', 'user'));
})->name('community');

Route::get('about-us/', function () {
    $data = ['about' => 'active',];
    return view('pages.about', $data);
})->name('about');
Route::get('faq/', function () {
    $data = ['faq' => 'active',];
    return view('pages.faq', $data);
})->name('faq');

Route::get('contact-us/', function () {
    $data = ['contact' => 'active',];
    return view('pages.contact', $data);
})->name('contact');

//=============== Contact Us Page
Route::post('message/', [\App\Http\Controllers\ContactUsController::class, 'store'])->name('send_query');


// ====================error page route ..


Route::get('error404/', function () {
    return view('errors.error');
})->name('error404');




//========================================external routes

// show user profiel
Route::get('/profile/{user_id}', [UserController::class, 'show_profile'])->name('show_prfile');

// show specialist profile info
Route::get('experts-profile/', function (Request $request) {

    $user = User::find($request->id);
    $doctorSchedule = App\Models\DoctorSchedule::where('status', 1)
        ->where('user_id', $request->id)
        ->get();
    return view('pages.experts_profile', compact('user', 'doctorSchedule'));
})->name('show_expert_profile');


//|======================================== Services 



Route::group(['prefix' => 'service', 'name' => 'service', 'as' => 'service.'], function () {

    // Route::get('/service', [ServiceController::class, 'index'])->name('createService');
    Route::resource('service-category', ServiceCategoryController::class);
    Route::resource('/manage-service', ServiceController::class);




})->middleware(['auth']);
