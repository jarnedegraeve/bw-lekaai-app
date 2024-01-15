<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQCategoryController;
use App\Http\Controllers\FAQItemController;
use App\Http\Controllers\CommentController;


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

Route::get('/', [PostController::class, 'index'])->name('index');

route::resource('post', PostController::class);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/profile/{user}', [AdminController::class, 'editProfile'])->name('admin.edit_profile');
    Route::put('/admin/profile/{user}', [AdminController::class, 'updateProfile'])->name('admin.update_profile');
});


route::get('like/{postid}', [LikeController::class, 'like'])->name('like');
route::get('user/{name}', [UserController::class, 'profile'])->name('profile');
Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('update_profile');


Route::get('/profile/{name}/edit/{user_id}', [UserController::class, 'editProfile'])->name('edit_profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::put('/toggle-admin/{user_id}', [UserController::class, 'toggleAdmin'])->name('toggle_admin');

Route::post('/posts/{postId}/comments', [CommentController::class, 'storeComment'])->name('comments.store')->middleware('auth');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/faq', [FAQCategoryController::class, 'index'])->name('faq.index');
Route::get('/faq/create', [FAQCategoryController::class, 'create'])->name('faq.create');
Route::post('/faq', [FAQCategoryController::class, 'store'])->name('faq.store');
Route::get('/faq/{category}/edit', [FAQCategoryController::class, 'edit'])->name('faq.edit');
Route::put('/faq/{category}', [FAQCategoryController::class, 'update'])->name('faq.update');
Route::delete('/faq/{category}', [FAQCategoryController::class, 'destroy'])->name('faq.destroy');

Route::get('/faq/{category?}/create', [FAQItemController::class, 'create'])->name('faq.create_item');
Route::post('/faq/{category}/items', [FAQItemController::class, 'store'])->name('faq.store_item');
Route::get('/faq/{category}/items/{item}/edit', [FAQItemController::class, 'edit'])->name('faq.edit_item');
Route::put('/faq/{category}/items/{item}', [FAQItemController::class, 'update'])->name('faq.update_item');
Route::delete('/faq/{category}/items/{item}', [FAQItemController::class, 'destroy'])->name('faq.destroy_item');


Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
