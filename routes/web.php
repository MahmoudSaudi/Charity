<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\SuperAdmin\Auth\LoginAuthController;
use App\Http\Controllers\SuperAdmin\Dashboard\CampaignController;
use App\Http\Controllers\SuperAdmin\Dashboard\CategoryController;
use App\Http\Controllers\SuperAdmin\Dashboard\OrganizationController;
use App\Http\Controllers\SuperAdmin\Dashboard\MyOrganizationController;

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


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[PaymentController::class,'PostState']);
Route::get('/pay/{id}/{org}',[PaymentController::class,'pay'])->name('pay');

Route::get('/state',[PaymentController::class,'state'])->name('state');



Route::get('/', function () {
    return view('auth.login2');
});

Route::post('/login',[LoginAuthController::class,'loginAuth'])->name('loginAuth');
// Route::get('/myOrganization',[LoginAuthController::class,'loginAuth'])->name('myOrganization');
Route::get('/logout', [LoginAuthController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'admin'], function () {

    Route::resource('organization', OrganizationController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('campaign', CampaignController::class);
    // Route::resource('MyOrganization', MyOrganizationController::class);
});


