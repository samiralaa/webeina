<?php

use App\Models\Content;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Qrcode\QrcodeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\Admin\FAQ\FAQController;

use App\Http\Controllers\Web\Front\HomeController;

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Step\StepController;
use App\Http\Controllers\Admin\IndustiralController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\About\AboutController;
use App\Http\Controllers\Admin\Quiz\AnswerController;
use App\Http\Controllers\Admin\Quiz\ResultController;
use App\Http\Controllers\Notofiction\ExcelController;
use App\Http\Controllers\Admin\Choose\ChooseController;
use App\Http\Controllers\Web\Package\PackageController;
use App\Http\Controllers\Admin\Content\ContentCotroller;
use App\Http\Controllers\Admin\Setting\FooterController;
use App\Http\Controllers\Web\Setting\LanguageController;
use App\Http\Controllers\Web\User\UserProfileController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\HomePage\HomePageController;

use App\Http\Controllers\Admin\Quiz\QuizQuestionController;
use App\Http\Controllers\Admin\CustomFiled\CustomController;
use App\Http\Controllers\Admin\Portfolio\PortfolioController;
use App\Http\Controllers\Api\Service\SubmitServiceController;
use App\Http\Controllers\Notification\NotificationController;

use App\Http\Controllers\Admin\Package\PackageRequestController;




use App\Http\Controllers\Admin\CustomFiled\CustomFildDataController;
use App\Http\Controllers\Web\Auth\UserController as AuthUserController;
use App\Http\Controllers\Web\ActivityLogService\ActivityLogServiceController;

use App\Http\Controllers\Web\Front\Home\HomeController as HomeHomeController;
use App\Http\Controllers\Admin\Package\PackageController as AdmniPackageController;
use App\Http\Controllers\Admin\Service\ServiceController as AdminServiceController;
use App\Http\Controllers\Web\Portfolio\PortfolioController as WebPortfolioController;

// AQU9uUZGYqSwhqp5EGwFYGYIVk6VVY6fcCJng6vCqb4mzEr05xc7PlaDbdpfbE_4rPv6234HsA5Phz20641s179VVE6NSPkTtIaH73SMPZMANaHprvCVcCH1FZ84sVMf3lFfxYop89LPDSvbjBv9hW1bIY0Hmd1P-8N2OQzsGnc-yijVdtKL34gUgZ7LXuF4yNjcCsTbjRXS6tHCVGHF0QMKcZaaWRIrONBOZ-KiOibBRfyz60GDj-ysi-i2DVGLWkst5Y5TNupojmeBiWHFvaPNBqDfjmqqretUXH1HCjKZdnyaV0MJFi_koosZ-k7taRhbfXhiW4qcSlm5hRZ1FYioMxUnbA
Route::get('portfolio-admin', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('portfolio', [WebPortfolioController::class, 'index'])->name('portfolio');

Route::get('project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('/linkedin/posts', [LinkedInController::class, 'getCompanyPosts']);

Route::get('/about', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/language/{locale}', [LanguageController::class, 'changeLanguage'])->name('language.change');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/', [HomeController::class, 'getAll'])->name('home');
Route::resource('footer', FooterController::class);


// users crud

// pages
Route::post('/services/update-order', [ServiceController::class, 'updateOrder'])->name('services.updateOrder');


Route::middleware(['isAdmin'])->group(function () {
    Route::get('/home-page', [HomePageController::class, 'index'])->name('home-page');

    // ***********************package order  routes****************************

    Route::post('/admin/package/order', [PackageRequestController::class, 'requestPackage'])->name('website.package.request');
    Route::get('/admin/package/request', [PackageRequestController::class, 'index'])->name('package.order.index');
    Route::get('/admin/package/request/show/{id}', [PackageRequestController::class, 'show'])->name('package-requests.show');
    Route::get('/admin/package/request/delete/{id}', [PackageRequestController::class, 'destroy'])->name('package-requests.destroy');
    Route::get('/admin/package/request/approve/{id}', [PackageRequestController::class, 'approveRequest'])->name('package-requests.edit');
    // *********************** end request package routes****************************
    // start Routes For About Us Page
    Route::get('/admin/about-us', [AboutController::class, 'aboutUsIndex'])->name('about-us.index');
    Route::get('/admin/about-us/create', [AboutController::class, 'aboutUsCreate'])->name('about-us.create');
    Route::post('/admin/about-us/store', [AboutController::class, 'aboutUsStore'])->name('about-us.store');
    Route::get('/admin/about-us/edit/{id}', [AboutController::class, 'aboutUsEdit'])->name('about-us.edit');
    Route::put('/admin/about-us/update/{id}', [AboutController::class, 'aboutUsUpdate'])->name('about-us.update');


    Route::get('/home-page/create', [HomePageController::class, 'create'])->name('home-page.create');
    Route::post('/home-page/store', [HomePageController::class, 'store'])->name('home-page.store');
    Route::get('/home-page/edit/{id}', [HomePageController::class, 'edit'])->name('home-page.edit');
    Route::put('/home-page/update/{id}', [HomePageController::class, 'update'])->name('home-page.update');
    Route::get('/home-page/delete/{id}', [HomePageController::class, 'destroy'])->name('home-page.destroy');

    Route::get('services/user', [HomeController::class, 'getServices'])->name('service.user');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contacts/{id}', [ContactController::class, 'show'])->name('admin.contact.show');
    Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');

    //


});


// contact

Route::get('contact/page', [ContactController::class, 'create'])->name('contact');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::post('add/content', [HomeController::class, 'store'])->name('add.content');
Route::get('/admin/sections', [HomeController::class, 'createSection'])->name('sections.create');
Route::post('/admin/sections/store', [HomeController::class, 'storeSection'])->name('sections.store');

// create content to serves


Route::middleware(['isAdmin'])->group(function () {
    Route::prefix('services')->group(function () {

        Route::get('/services', [AdminServiceController::class, 'index'])->name('services.index');
        Route::get('/create', [AdminServiceController::class, 'create'])->name('services.create');
        Route::post('/store', [AdminServiceController::class, 'store'])->name('services.store');
        Route::get('/show/{id}', [AdminServiceController::class, 'show'])->name('services.show');
        Route::get('/edit/{id}', [AdminServiceController::class, 'edit'])->name('services.edit');
        Route::put('/update/{id}', [AdminServiceController::class, 'update'])->name('services.update');
        Route::delete('/delete/{id}', [AdminServiceController::class, 'destroy'])->name('services.destroy');
        Route::get('request', [SubmitServiceController::class, 'getAllRequest'])->name('services.request');
    });

    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');

    // quiz routes by samir
    Route::group(['prefix' => 'quiz'], function () {
        Route::resource('questions', QuizQuestionController::class);
        Route::resource('answers', AnswerController::class);
        Route::resource('results', ResultController::class);
    });
    Route::get('serves-section', [ServiceController::class, 'createSection'])->name('serves.create.section');

    // custom fild  Route

    Route::group(['prefix' => 'custom-field'], function () {

        Route::get('', [CustomController::class, 'index'])->name('custom.index');
        Route::get('create', [CustomController::class, 'create'])->name('attributes.create');
        Route::post('store', [CustomController::class, 'store'])->name('attributes.store');

        Route::get('show/{id}', [CustomController::class, 'show'])->name('custom.show');
        Route::get('edit/{id}', [CustomController::class, 'edit'])->name('custom.edit');
        Route::post('update/{id}', [CustomController::class, 'update'])->name('custom.update');
        Route::delete('delete/{id}', [CustomController::class, 'destroy'])->name('custom.delete');
        Route::post('data/custom-field', [CustomFildDataController::class, 'store'])->name('custom.data.store');
    });
});
Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');

//ActivityLogService
Route::group(['prefix' => 'activity-log'], function () {
    Route::get('', [ActivityLogServiceController::class, 'index'])->name('activity-log.index');
    Route::get('create', [ActivityLogServiceController::class, 'create'])->name('activity-log.create');
    Route::get('edit/{id}', [ActivityLogServiceController::class, 'edit'])->name('activity-log.edit');
    Route::put('update/{id}', [ActivityLogServiceController::class, 'update'])->name('admin.activity-logs.update');
    Route::post('store', [ActivityLogServiceController::class, 'store'])->name('admin.activity-logs.store');
    Route::get('show/{id}', [ActivityLogServiceController::class, 'activityLogShow'])->name('activity-log.show');
    Route::delete('delete/{id}', [ActivityLogServiceController::class, 'destroy'])->name('activity-log.destroy');
});

// package routes

Route::get('/package', [AdmniPackageController::class, 'index'])->name('package.index');
Route::get('/package/create', [AdmniPackageController::class, 'create'])->name('package.create');
Route::post('/package/store', [AdmniPackageController::class, 'store'])->name('package.store');
Route::get('/package/edit/{id}', [AdmniPackageController::class, 'edit'])->name('package.edit');
Route::put('/package/update/{id}', [AdmniPackageController::class, 'update'])->name('package.update');
Route::delete('/package/delete/{id}', [AdmniPackageController::class, 'destroy'])->name('package.delete');

// route serves

Route::get('admin/fqa', [FAQController::class, 'index'])->name('faq.index');
Route::get('admin/fqa/create', [FAQController::class, 'create'])->name('faq.create');
Route::post('admin/fqa/store', [FAQController::class, 'store'])->name('faqs.store');
Route::delete('admin/faq/delete/{id}',[FAQController::class, 'delete'])->name('faq.destroy');

// website.package.order
Route::prefix('services')->group(function () {

    Route::get('details/{id}', [HomeController::class, 'servesDetails'])->name('serves.details');
    Route::get('', [UserProfileController::class, 'index'])->name('user-profile');
});

// add content toserves
Route::get('/admin/serves/{id}', [ContentCotroller::class, 'index'])->name('services.index.content');
Route::get('/admin/serves/create/{id}', [ContentCotroller::class, 'create'])->name('services.create.content');
Route::post('/admin/serves/store/{id}', [ContentCotroller::class, 'store'])->name('contents.store');
Route::get('/admin/serves/edit/{id}', [ContentCotroller::class, 'edit'])->name('services.edit.content');

Route::put('/admin/serves/update/{id}', [ContentCotroller::class, 'update'])
    ->name('services.update.content');
Route::delete('admin/serves/delete/{id}', [ContentCotroller::class, 'destroy'])->name('services.delete.content');


// faqs front
Route::get('/faqs', [HomeHomeController::class, 'faqs'])->name('faqs.index');


// notofications
Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('notifications.index');
// emails notification
Route::get('/admin/emails/notification', [NotificationController::class, 'emailsNotificationIndex'])->name('emails.notification.index');
Route::post('/send/emails/for/users/byexcel', [ExcelController::class, 'processUpload'])->name('upload-excel');
Route::get('/show/upload/form/for/emails', [ExcelController::class, 'showUploadForm'])->name('show.uplode.from');
// i user pages

Route::get('/clear-all-cache', function () {
    $exitCodeCacheClear = Artisan::call('cache:clear');
    $exitCodeOptimize = Artisan::call('optimize');
    $exitCodeRouteCache = Artisan::call('route:cache');
    $exitCodeRouteClear = Artisan::call('route:clear');
    $exitCodeViewClear = Artisan::call('view:clear');
    $exitCodeConfigCache = Artisan::call('config:cache');
    $exitCodeStorageLink = Artisan::call('storage:link');
    $exitCode = Artisan::call('migrate');

    return response()->json([
        'message' => 'All caches cleared, storage linked, and system optimized.',
        'cache_clear' => $exitCodeCacheClear,
        'optimize' => $exitCodeOptimize,
        'route_cache' => $exitCodeRouteCache,
        'route_clear' => $exitCodeRouteClear,
        'view_clear' => $exitCodeViewClear,
        'config_cache' => $exitCodeConfigCache,
        'storage_link' => $exitCodeStorageLink,
    ]);
});



Route::prefix('admin/steps')->name('admin.steps.')->group(function () {
    Route::get('/', [StepController::class, 'index'])->name('index');
    Route::get('/create/{id}', [StepController::class, 'create'])->name('create');
    Route::post('/', [StepController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [StepController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StepController::class, 'update'])->name('update');
    Route::delete('/{id}', [StepController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin/choose')->name('admin.choose.')->group(function () {
    Route::get('/{id}', [ChooseController::class, 'index'])->name('index');
    Route::get('/create/{id}', [ChooseController::class, 'create'])->name('create');
    Route::post('/', [ChooseController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ChooseController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ChooseController::class, 'update'])->name('update');
    Route::delete('/{id}', [ChooseController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin/industrial')->name('admin.industrial.')->group(function () {
    Route::get('/{id}', [IndustiralController::class, 'index'])->name('index');
    Route::get('/create/{id}', [IndustiralController::class, 'create'])->name('create');
    Route::post('/', [IndustiralController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [IndustiralController::class, 'edit'])->name('edit');
    Route::put('/{id}', [IndustiralController::class, 'update'])->name('update');
    Route::delete('/{id}', [IndustiralController::class, 'destroy'])->name('destroy');
});

Route::get('schedule-meet',function()
{
return view('website.schedule-meet');
})->name('schedule-meet');
Route::get('getall-contents/{id}',[ServiceController::class, 'getContentToServes'])->name('getall');

Route::get('generate-qrcode', [QrcodeController::class, 'index'])->name('generate-qrcode');
Route::get('create/generate-qrcode', [QrcodeController::class, 'create'])->name('generate-qrcode');
Route::post('store/generate-qrcode', [QrcodeController::class, 'generateQRCode'])->name('generate.qrcode');

Route::get('/profile/{id}', [QrcodeController::class, 'show'])->name('profile.show');
