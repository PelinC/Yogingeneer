<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\BlogController;
use App\Http\Controllers\Back\ProjectController;
use App\Http\Controllers\Back\ConfigController;
/*
|--------------------------------------------------------------------------
|Backend Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'loginPost'])->name('admin.login.post');
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
  Route::get('panel', [Dashboard::class, 'index'])->name('dashboard');
  Route::resource('posts',BlogController::class);
  Route::resource('projects',ProjectController::class);
  Route::get('/switch',[BlogController::class,'switch'])->name('switch');
  Route::get('/projectswitch',[ProjectController::class,'projectswitch'])->name('projectswitch');
  Route::get('/deletepost/{id}',[BlogController::class,'delete'])->name('delete.post');
  Route::get('/deleteproject/{id}',[ProjectController::class,'delete'])->name('delete.project');
  Route::get('logout',[AuthController::class,'logout'])->name('logout');
  Route::get('/settings',[ConfigController::class,'index'])->name('config.index');

});



/*
|--------------------------------------------------------------------------
|Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Homepage::class, 'index'])->name('homepage');
Route::get('/Resume', [Homepage::class, 'resume'])->name('resume');
Route::get('/AboutMe', [Homepage::class, 'aboutMe'])->name('aboutme');
Route::get('/Blog', [Homepage::class, 'blog'])->name('blog');
Route::get('/Contact', [Homepage::class, 'contact'])->name('contact');
Route::get('/Projects', [Homepage::class, 'projects'])->name('projects');
Route::get('/PostCategories/{category}', [Homepage::class, 'category'])->name('postcategories');
Route::post('/Contact', [Homepage::class, 'contactpost'])->name('contact.post');
Route::get('/{category}/{slug}', [Homepage::class, 'single'])->name('single');
Route::get('/{slug}', [Homepage::class, 'project'])->name('project');
URL::forceScheme('https');
