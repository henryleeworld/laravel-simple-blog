<?php

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
Route::redirect('/', '/posts');
Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Posts
    Route::delete('posts/destroy', 'PostsController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostsController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostsController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostsController');
});
Route::group(['as' => 'frontend.', 'namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/home', 'HomeController@index')->name('home');

        // Posts
        Route::resource('posts', 'PostsController')->only(['create', 'store']);
    });
    Route::resource('posts', 'PostsController')->only(['index', 'show']);
});
