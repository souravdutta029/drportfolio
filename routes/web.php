<?php

//Front Controllers
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubpageController;
use App\Http\Controllers\Admin\AccordionController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Route;

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

// Front Routes
Route::get('/',[FrontController::class,'index']);
Route::get('/about',[FrontController::class,'about']);
Route::get('/clinics',[FrontController::class,'clinics']);
Route::get('/contact',[FrontController::class,'contact']);
Route::get('/faq',[FrontController::class,'faq']);
Route::get('/media',[FrontController::class,'media']);
Route::get('/services',[FrontController::class,'services']);

//Page Route
Route::get('/main/{slug}', [FrontController::class,'page']);

//Subpage Routes
Route::get('/submenu/{slug}', [FrontController::class,'subpage']);

// Front Contact form route(Save)
Route::post('/contact',[FrontController::class,'contact_save'])->name('contact_save');



// Admin Panel Routes
Route::get('admin/login',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

//Routes with middleware
Route::group(['middleware' => 'admin_auth'], function(){
    // Dashboard
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);

    // Home Banner Routes
    Route::get('admin/home_banner',[BannerController::class,'home_banner']);
    Route::get('admin/home_banner/manage_home_banner',[BannerController::class,'manage_home_banner']);
    Route::get('admin/home_banner/manage_home_banner/{id}',[BannerController::class,'manage_home_banner']);
    Route::post('admin/home_banner/manage_home_banner_process',[BannerController::class,'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');
    Route::get('admin/home_banner/delete/{id}',[BannerController::class,'delete']);
    Route::get('admin/home_banner/status/{status}/{id}',[BannerController::class,'status']);

    // Page Routes
    Route::get('admin/page',[PageController::class,'page']);
    Route::get('admin/page/manage_page',[PageController::class,'manage_page']);
    Route::get('admin/page/manage_page/{id}',[PageController::class,'manage_page']);
    Route::post('admin/page/manage_page_process',[PageController::class,'manage_page_process'])->name('page.manage_page_process');
    Route::get('admin/page/delete/{id}',[PageController::class,'delete']);
    Route::get('admin/page/status/{status}/{id}',[PageController::class,'status']);

    // Sub Page Routes
    Route::get('admin/sub_page',[SubpageController::class,'sub_page']);
    Route::get('admin/sub_page/manage_sub_page',[SubpageController::class,'manage_sub_page']);
    Route::get('admin/sub_page/manage_sub_page/{id}',[SubpageController::class,'manage_sub_page']);
    Route::post('admin/sub_page/manage_sub_page_process',[SubpageController::class,'manage_sub_page_process'])->name('sub_page.manage_sub_page_process');
    Route::get('admin/sub_page/delete/{id}',[SubpageController::class,'delete']);
    Route::get('admin/sub_page/status/{status}/{id}',[SubpageController::class,'status']);


    // contact Routes
    Route::get('admin/contact',[ContactController::class,'contactlist']);
    Route::get('admin/contact/delete/{id}',[ContactController::class,'delete']);

    // Accordion Routes
    Route::get('admin/accordion',[AccordionController::class,'accordion']);
    Route::get('admin/accordion/manage_accordion',[AccordionController::class,'manage_accordion']);
    Route::get('admin/accordion/manage_accordion/{id}',[AccordionController::class,'manage_accordion']);
    Route::post('admin/accordion/manage_accordion_process',[AccordionController::class,'manage_accordion_process'])->name('accordion.manage_accordion_process');
    Route::get('admin/accordion/delete/{id}',[AccordionController::class,'delete']);
    Route::get('admin/accordion/status/{status}/{id}',[AccordionController::class,'status']);


    // Home Profile Routes
    Route::get('admin/home_profile',[ProfileController::class,'home_profile']);
    Route::get('admin/home_profile/manage_home_profile',[ProfileController::class,'manage_home_profile']);
    Route::get('admin/home_profile/manage_home_profile/{id}',[ProfileController::class,'manage_home_profile']);
    Route::post('admin/home_profile/manage_home_profile_process',[ProfileController::class,'manage_home_profile_process'])->name('home_profile.manage_home_profile_process');

    // Logout Route
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_NAME');
        session()->flash('success','You have been logged out successfully.');
        return redirect('admin/login');
    });
});


