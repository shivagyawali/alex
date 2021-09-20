<?php

use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\PersonalConsultancyController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\StockAnalysisController;
use App\Http\Controllers\admin\TermsAndConditionController;
use App\Http\Controllers\admin\WhoAreWeController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [FrontController::class, 'index']);
Route::get('/test', [FrontController::class, 'test']);


Route::get('/dashboard', function () {

    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {

    Route::get('/', [SettingController::class, 'index']);
    Route::resource('home', HomeController::class);
    Route::resource('who-are-we', WhoAreWeController::class);

    Route::resource('personal-consultancy', PersonalConsultancyController::class);

    Route::resource('course', CourseController::class);

    Route::resource('stock-analysis', StockAnalysisController::class);
    Route::resource('contact-us', ContactUsController::class);

    Route::resource('terms-and-conditions', TermsAndConditionController::class);


    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
});


require __DIR__ . '/auth.php';


// frontend

Route::get('/', [FrontController::class, 'index'])->name('front.home');
Route::get('/home-pdf', [FrontController::class, 'homePdf'])->name('home.pdf');



Route::get('/who-are-we-pdf', [FrontController::class, 'whoAreWePdf'])->name('who-are-we.pdf');
Route::get('/personal-consultancy-pdf', [FrontController::class, 'personalConsultancy'])->name('personal-consultancy.pdf');
Route::get('/courses-pdf', [FrontController::class, 'courses'])->name('courses.pdf');
Route::get('/stock-analysis-pdf', [FrontController::class, 'stockAnalysis'])->name('stock-analysis.pdf');
Route::get('/contact-us-pdf', [FrontController::class, 'contactUs'])->name('contact-us.pdf');
Route::get('/terms-and-conditions-pdf', [FrontController::class, 'termsAndConditions'])->name('terms-and-conditions.pdf');


Route::post('/send-email', [FrontController::class, 'sendEmail'])->name('send.email');

Route::post('/live-chat', [FrontController::class, 'liveChat'])->name('live.chat');
