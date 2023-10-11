<?php

use App\Http\Controllers\ReviewSertifikasi\CertificateReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentRestaurantController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RestaurantFeedbackController;
use App\Http\Controllers\CertifiedRestaurantController;
use App\Http\Controllers\ReviewSertifikasi\ClaimController;
use App\Http\Controllers\ReviewSertifikasi\MyReviewController;
use App\Http\Controllers\ReviewSertifikasi\ReportController;
use App\Http\Controllers\ReviewSertifikasi\RestaurantController;
use App\Http\Controllers\ReviewSertifikasi\ReviewController;
use App\Http\Controllers\ReviewSertifikasi\ReviewerController;
use App\Models\CertificateReport;
use App\Models\Restaurant;

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

Route::get('/', function () {
    return view('landing_page.landing_page', [
        'restaurants' => Restaurant::orderBy('created_at', 'desc')->get(), //Nanti diganti ini berdasarkan rating kalo udh ada db komentar
        'navbar' => 'user',
        'title' => 'Landing Page'
    ]);
});

route::controller(UserController::class)->group(function () {
    //Register
    route::get('/register', 'index');
    route::post('/register/create-new-user', 'store');
    //Login
    route::get('/login', 'login_index');
    Route::post('/login', 'authenticate');
    //Logout
    Route::post('/logout', 'logout');
    //Profile
    route::get('/profile', 'profile');
    route::get('/profile/edit/{encryptedId}', 'edit_profile');
    route::post('/profile/edit/{encryptedId}', 'update_profile');
    route::get('/profile/edit-password/{encryptedId}', 'edit_password');
    route::post('/profile/edit-password/{encryptedId}', 'update_password');
});

route::controller(ContentRestaurantController::class)->group(function () {
    //Index
    Route::get('/restaurant', 'index');
    //Detail Resto
    Route::get('/restaurant/{area}/{name}/{id}', 'show');
    //Search
    Route::get('/search', 'find');
    //Filter
    Route::get('/filter', 'index');
    //Manage Resto
    Route::get('/my-resto', 'manage_resto_index');
    //Detail Resto
    Route::get('/restaurant/manage/{area}/{name}/{id}', 'manage_resto_show');
    //Edit Resto
    Route::get('/restaurant/edit/{area}/{name}/{id}', 'manage_resto_edit');
});

route::controller(FavoriteController::class)->group(function () {
    //Index
    Route::get('/my-favorites', 'index');
    //Create
    Route::get('/add-favorite/{id}', 'store');
    //Delete
    Route::get('/remove-favorite/{id}', 'destroy');
});

route::controller(MyReviewController::class)->group(function () {
    //Index
    route::get('/review-saya', 'index');
    route::get('/review_saya/{slug}', 'filter');
    // route::get('/review_saya/{slug}', 'filter');
});

route::controller(RestaurantController::class)->group(function () {
    //Index
    Route::get('/review-saya/create-resto', 'create');
    Route::post('/review_saya/tambah_resto', 'store');
    Route::post('/review_saya/tambah_resto/temporary_image', 'temporaryImage_store')->name('upload');
    Route::delete('/review_saya/tambah_resto/temporary_image', 'temporaryImage_destroy')->name('destroy');
    Route::get('/review_saya/edit_resto/{id}', 'edit');
    Route::post('/review_saya/edit_resto/image_edit/{id}', 'image_edit');
    Route::delete('/review_saya/edit_resto/image_destroy/{id}', 'image_destroy');
    Route::post('/review_saya/edit_resto/{id}', 'update');
    Route::get('/review_saya/detail_resto/{id}', 'show');
    Route::delete('/review_saya/delete_resto/{id}', 'destroy');
});

route::controller(CertifiedRestaurantController::class)->group(function () { //changed
    //Regular
    Route::get('/certified_restaurants/regular', 'index_regular');
    //Self Declare
    Route::get('/certified_restaurants/self_declare', 'index_self_declare');
    //Detail
    Route::get('/certified_restaurant/detail_resto/{id}', 'show');
});

route::controller(RestaurantFeedbackController::class)->group(function () { //changed
    //Create
    Route::post('/add-comment/{id}', 'store');
    //Edit
    Route::post('/update-comment/{id}', 'update');
    //Edit
    Route::post('/delete-comment/{id}', 'destroy');
});

route::controller(ReviewController::class)->group(function () {
    Route::get('/review_saya/laporan_sertifikasi/{id}', 'create');
    Route::post('/review_saya/laporan_sertifikasi/tambah_laporan_sertifikasi', 'store');
    Route::get('/report-restaurant/edit-certificate-report/{id}', 'edit');
    Route::post('/report-restaurant/edit-certificate-report/{id}', 'update');
});

route::controller(ReviewerController::class)->group(function () {
    Route::get('/list_restoran', 'index');
    Route::get('/list_restoran/filter', 'filter');
    Route::post('/list_restoran/tambah_reviewer', 'store');
});

route::controller(ClaimController::class)->group(function () {
    Route::get('/claim-restoran', 'index');
    Route::post('/claim-restoran/create-claim', 'store');
});
route::controller(ReportController::class)->group(function () {
    Route::get('/report-restaurant', 'index');
    Route::get('/report-restaurant/detail-report/{id}', 'show');
    Route::post('/report-restoran/create-report', 'store');
});
