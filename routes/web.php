<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'show']);
});
Route::get('/dashboard', function () {
    return view('dashboard');
//    Route::get('/', 'PostController@index')->name('posts.index');

})->middleware(['auth', 'verified'])->name('dashboard');
//// Защищенные маршруты для аутентифицированных пользователей
//Route::group(['middleware' => 'auth'], function () {
//    // Список постов
//    Route::get('/posts', 'PostController@index')->name('posts.index');
//    // Форма создания поста
//    Route::get('/posts/create', 'PostController@create')->name('posts.create');
//    // Сохранение нового поста
//    Route::post('/posts', 'PostController@store')->name('posts.store');
//    // Форма редактирования поста
//    Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
//    // Обновление поста
//    Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
//    // Удаление поста
//    Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
//});

require __DIR__.'/auth.php';
