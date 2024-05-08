<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\User\Api\OrgController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\SuperAdmin\Dashboard\OrganizationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
*/

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/profile', function (Request $request) {
        return $request->user();
    });
    Route::post('/review', [ReviewController::class,'store']);

    Route::put('updateProfile', [ProfileController::class, 'updateProfile']);

    Route::post('password/resetPassword', [ResetPasswordController::class, 'resetPassword']);

    Route::post('/state',[PaymentController::class,'PostState']);
});

<<<<<<< HEAD

Route::post('/state/{organization}',[PaymentController::class,'PostState']);

=======
Route::get('/',function(){
    return 'Hello World';
});
>>>>>>> a18dd57a327e272edeca931d2e9b9a12b705fc57


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::post('password/forgetPassword', [ForgetPasswordController::class, 'forgetPassword']);


// Review


Route::get('/user/reviews/{id}', [ReviewController::class,'getUserReviews']);
Route::get('/all-reviews', [ReviewController::class ,'getAllReviews']);

// Organization
Route::get('/organizations', [OrgController::class,'getAllOrg']);
Route::get('/organization/{id}', [OrgController::class,'showOrg']);
Route::get('/organization/category/{id}', [OrgController::class,'showOrgs']);

// Category
Route::get('/categories', [OrgController::class,'showCategories']);
Route::get('/category/{id}', [OrgController::class,'showOneCategory']);

// Campaign
Route::get('/campaigns', [OrgController::class,'showCampaigns']);
Route::get('/campaign/{id}', [OrgController::class,'showOneCampaign']);
// Route::get('/category/{id}', [OrgController::class,'showOrg']);

