<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\StatesController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AppSettingController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;

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

Route::get('/', [AuthController::class, 'showLoginForm']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login/check', [AuthController::class, 'login'])->name('admin.login.check');
Route::get('/forgot/password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('admin.forgotpassword');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.eamil');
Route::get('/password/reset/{token}/{email}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('admin.password.token');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.reset');


Route::group(['middleware' => ['admin']], function () {

	/* Logout Route */
	Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

	/* Super Admin Module Routes */
	Route::any('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
	Route::any('/dashboard/get-data', [DashboardController::class, 'dashboardGetData'])->name('admin.get.dashboard.data');
	Route::get('/', [DashboardController::class, 'index']);

	/* Admin Profile Route */
	Route::get('/my/profile', [AdminController::class, 'index'])->name('admin.show.profile');
	Route::get('/edit/profile', [AdminController::class, 'edit'])->name('admin.edit.profile');
	Route::post('/update/profile', [AdminController::class, 'update'])->name('admin.update.profile');

	/* Admin Change Password Route */
	Route::get('/change-password', [AdminController::class, 'changePasswordView'])->name('admin.change.password.view');
	Route::post('/update/password', [AdminController::class, 'changePassword'])->name('admin.change.password');

	/* App Settings Route */
	Route::get('/app-setting', [AppSettingController::class, 'create'])->name('admin.app.setting.create');
	Route::post('/app-setting/store', [AppSettingController::class, 'store'])->name('admin.app.setting.store');

	/* Site Setting Route */
	Route::get('/site-setting', [SiteSettingController::class, 'create'])->name('admin.site.setting.create');
	Route::post('/site-setting/store', [SiteSettingController::class, 'store'])->name('admin.site.setting.store');

	/* Users Route */
	Route::post('/user/list/data', [UserController::class, 'listData'])->name('admin.user.listdata');
	Route::post('/user/multiple/destroy', [UserController::class, 'multipleDestroy'])->name('admin.user.multiple.destroy');
	Route::post('/user/status/change/{id}', [UserController::class, 'statusChange'])->name('admin.user.status.change');
	Route::resource('/users', UserController::class)->names([
		'index' => 'admin.user.index',
		'create' => 'admin.user.create',
		'store' => 'admin.user.store',
		'edit' => 'admin.user.edit',
		'update' => 'admin.user.update',
		'show' => 'admin.user.show',
		'destroy' => 'admin.user.destroy',
	]);

	/* Topics Route */
	Route::post('/topic/root/data', [TopicController::class, 'getRootData'])->name('admin.topic.get.root.data');
	Route::post('/topic/nod/data', [TopicController::class, 'getNodData'])->name('admin.topic.get.nod.data');
	Route::post('/topic/nod/create', [TopicController::class, 'updateOrCreateTopic'])->name('admin.topic.create.or.update');
	Route::post('/topic/nod/delete', [TopicController::class, 'deleteTopic'])->name('admin.topic.delete');
	Route::resource('/topics', TopicController::class)->names([
		'index' => 'admin.topic.index',
	]);

	/* CMS Page Route */
	Route::post('/cms/list/data', [CmsController::class, 'listData'])->name('admin.cms.listdata');
	Route::post('/cms/multiple/destroy', [CmsController::class, 'multipleDestroy'])->name('admin.cms.multiple.destroy');
	Route::post('/cms/status/change/{id}', [CmsController::class, 'statusChange'])->name('admin.cms.status.change');
	Route::resource('/cms', CmsController::class)->names([
		'index' => 'admin.cms.index',
		'create' => 'admin.cms.create',
		'store' => 'admin.cms.store',
		'edit' => 'admin.cms.edit',
		'update' => 'admin.cms.update',
		'show' => 'admin.cms.show',
		'destroy' => 'admin.cms.destroy',
	]);
});

/* Get all countries */
Route::post('/get-countries', [CountryController::class, 'getAll'])->name('ajax.get.countries');
Route::get('/get-country/{id}', [CountryController::class, 'getCountry'])->name('ajax.get.country');
Route::post('/get-states-by-country', [StatesController::class, 'getAll'])->name('ajax.get.states.by.country');
Route::get('/get-state/{id}', [StatesController::class, 'getState'])->name('ajax.get.state');
Route::post('/get-cities-by-state', [CitiesController::class, 'getAll'])->name('ajax.get.cities.by.states');
Route::get('/get-city/{id}', [CitiesController::class, 'getCity'])->name('ajax.get.city');

Route::get('/language/{locale}', function (string $locale) {
	if (!in_array($locale, ['en', 'gu', 'fr'])) {
		abort(400);
	}
	App::setLocale($locale);
	session()->put('locale', $locale);
	return back();
})->name('language.change');
