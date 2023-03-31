<?php

use Database\Seeders\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Member\TableController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\CategoryController;
use App\Http\Controllers\Member\ManagerController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Member\ReservationController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Member\RestaurantController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\RestaurantController as FrontendRestaurantController;
use App\Http\Controllers\Frontend\TestimonialController;

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



Route::get('/', [WelcomeController::class, 'index']);
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/restaurants', [FrontendRestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/show/{id}', [FrontendRestaurantController::class, 'show'])->name('restaurants.show');
Route::get('/reservations/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservations/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservations/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservations/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');
Route::get('/testimonials/create/{id}', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');


Route::middleware('auth', 'verified')->name('member.')->prefix('member')->group(function () 
{
    Route::get('/', [MemberController::class, 'index'])->name('index');
    Route::resource('/restaurants', RestaurantController::class);
    //Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class)->except('show');
    Route::resource('/tables', TableController::class);
    Route::patch('/menus/{menu}/restore', [MenuController::class, 'restore'])->name('menus.restore');
    Route::delete('/menus/{menu}/force-delete', [MenuController::class, 'forceDelete'])->name('menus.force-delete');
    Route::resource('/reservation', ReservationController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin', 'verified'])->name('admin.')->prefix('admin')->group(function()
{
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/restaurants', AdminRestaurantController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservation', ReservationController::class);
    Route::resource('/managers', ManagerController::class);
});

require __DIR__.'/auth.php';
