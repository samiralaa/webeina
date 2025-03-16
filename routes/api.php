<?php

use App\Http\Controllers\Admin\Quiz\QuizQuestionController;
use App\Http\Controllers\Api\ActivityLog\ActivityLogServiceController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Quiz\ResuiltController;
use App\Http\Controllers\Api\Service\ServiceController;

use App\Http\Controllers\Api\Service\SubmitServiceController;
use App\Http\Controllers\Notofiction\ExcelController;
use App\Http\Controllers\Web\Admin\HomePage\SliderController;
use App\Http\Controllers\Web\Front\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinkedInController;



Route::get('/linkedin/auth', [LinkedInController::class, 'getCompanyPosts']);


Route::get('services/mobile/{lang}', [ServiceController::class, 'index']);
Route::get('services-mobile/details/{id}/{lang}', [ServiceController::class, 'show'])->name('get.details');
// Route::post('add/content',[HomeController::class,'store'])->name('add.content');

// Auth Routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Auth Routes
Route::middleware('auth:sanctum')->group(function () {
    // Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    // routes to user if he need request servev for mobile app
    // delete user account
    Route::post('delete-user', [AuthController::class, 'deleteUser'])->middleware('auth:sanctum');
    Route::post('mobile-submit/service', [SubmitServiceController::class, 'store']);
    // get User serves to user if he need request servev for mobile app
    Route::get('mobile-services/for/user/{lang}', [ServiceController::class, 'getServicesForUser']);
    Route::post('/quiz-results', [ResuiltController::class, 'storeMultipleResults']);

    Route::get('questions/lang/{lang}', [ResuiltController::class, 'getAllQuestionByQuizByLangForMobile']);
    // api for get all history of user
    Route::post('history/user', [ActivityLogServiceController::class, 'getDataForUser']);
    // api to submit service for mobile app
    Route::post('mobile-submit/service/details', [ActivityLogServiceController::class, 'store']);
    // api for update user submit
    Route::post('update-submit/service/details/{id}', [ActivityLogServiceController::class, 'updateSubmitServiceDetails']);
    Route::get('history/service/show/{id}', [ActivityLogServiceController::class, 'show']);


    // api to get all quiz questions for mobile app

    // api to delete user service
    Route::delete('delete/service/{id}', [ServiceController::class, 'delete_service']);
});

Route::get('/upload', [ExcelController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [ExcelController::class, 'processUpload'])->name('upload.process');
