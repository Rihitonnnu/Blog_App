<?php

use App\Http\Controllers\User\PostsController;
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

Route::get('/', function () {
    return view('user.welcome');
});

Route::resource('posts',PostsController::class)
->middleware(['auth:users']);

Route::prefix('expired-posts')->middleware('auth:users')->group(function(){
    Route::get('index',[PostsController::class,'expiredPostsIndex'])->name('expired-posts.index');
    Route::post('destroy/{post}',[PostsController::class,'expiredPostsDestroy'])->name('expired-posts.destroy');
    Route::patch('restore/{post}',[PostsController::class,'expiredPostsRestore'])->name('expired-posts.restore');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';
