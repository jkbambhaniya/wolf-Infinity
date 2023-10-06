<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\SocialLoginController;

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

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/{slug}', [WelcomeController::class, 'getCmsData'])->name('cms.view');
Route::get('social-auth/{provider}/callback', [SocialLoginController::class, 'providerCallback']);
Route::get('social-auth/{provider}', [SocialLoginController::class, 'redirectToProvider'])->name('social.redirect');

Route::group(['middleware' => ['auth']], function () {

	Route::get('/home', [HomeController::class, 'index'])->name('home');
	Route::post('/add/topics', [HomeController::class, 'addTopics'])->name('add.topic');
	Route::post('/update/topics', [HomeController::class, 'updateTopics'])->name('update.topic');

	/* User Profile Route */
	// Route::get('/profile', [UserController::class, 'index'])->name('user.show.profile');
	Route::get('/edit/profile', [UserController::class, 'edit'])->name('user.edit.profile');
	Route::post('/update/profile', [UserController::class, 'update'])->name('user.update.profile');
	Route::post('/change/password', [UserController::class, 'changePassword'])->name('user.change.password');

	/* Post Route */
	/* 	Route::get('/post/create', [PostController::class, 'index'])->name('post.create');
	Route::post('/post/update', [PostController::class, 'update'])->name('post.update'); */
	Route::resource('/posts', PostController::class)->names([
		'index' => 'post.index',
		'create' => 'post.create',
		'store' => 'post.store',
		'edit' => 'post.edit',
		'update' => 'post.update',
		'show' => 'post.show',
		'destroy' => 'post.destroy',
	]);

	Route::post('ajax/file/upload', [HomeController::class, 'imageUpload'])->name('ajax.file.upload');
});
