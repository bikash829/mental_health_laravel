<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
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


// service booking

Route::group(['middleware' => ['auth', 'role:user'], 'prefix' => 'booking', 'name' => 'booking', 'as' => 'booking.'], function () {
    Route::resource('service', ServiceBooking::class);
    Route::get('/service/booking/{service}', [ServiceBooking::class, 'bookService'])->name('service.bookService');
    Route::POST('/service/booking/payment', [ServiceBooking::class, 'bookServicePayment'])->name('service.bookServicePayment');
    // Route::get('/service/booking/{service}', [ServiceBooking::class, 'bookService'])->name('service.bookService');
    Route::get('/service/booking/payment/method', [ServiceBooking::class, 'paymentMethod'])->name('service.paymentMethod');
    Route::post('/service/booking/processed-to-pay/{id}', [ServiceBooking::class, 'confirmingOrderForPayment'])->name('service.confirmingOrderForPayment');
    Route::get('/service/booing/payment-success', [ServiceBooking::class, 'paymentSuccess'])->name('service.paymentSuccess');



});



// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
