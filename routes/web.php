<?php

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

// AUTH
Auth::routes();
// STATIC PAGE URL
Route::prefix('page')->group(function()
{
	Route::get('about','PageController@about')->name('about');
	Route::get('contact','PageController@contact')->name('contact');
});
// POST URL
Route::resource('post','PostController');
Route::get('my-posts','PostController@myPosts');
Route::get('postsresources','PostController@getPostReources');
// Home URL
Route::get('/home', 'HomeController@index')->name('home');
// logout and other url
Route::get('/','PageController@index');
Route::get('/logout','HomeController@logout')->name('userlogout');
// Conact URL
Route::post('/contact','ContactController@submitContact')->name('contact.submit');
