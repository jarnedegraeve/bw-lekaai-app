<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
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
