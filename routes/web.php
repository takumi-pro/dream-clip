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
Auth::routes();
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback','Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}','Auth\RegisterController@registerProviderUser')->name('{provider}');
});
Route::get('/','ArticleController@index')->name('articles.index');
Route::resource('/articles','ArticleController')->except(['index','show'])->middleware('auth');
Route::resource('/articles','ArticleController')->only(['show']);
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});
Route::get('/tags/{name}','TagController@show')->name('tags.show');
Route::prefix('users')->name('users.')->group(function(){
    Route::get('/{name}','UserController@show')->name('show');
    Route::get('/{name}/likes','UserController@likes')->name('likes');
    Route::get('/{name}/declarations','UserController@declarations')->name('declarations');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::get('/{name}/profedit','UserController@profeditForm')->name('profedit');
    Route::patch('/{name}/profedit','UserController@profedit')->name('edit');
    Route::middleware('auth')->group(function(){
        Route::put('/{name}/follow','UserController@follow')->name('follow');
        Route::delete('/{name}/follow','UserController@unfollow')->name('unfollow');
    });
});
Route::get('/declaration','DeclarationController@show')->name('declaration');
Route::get('/declaration/create','DeclarationController@create')->name('declaration.create')->middleware('auth');
Route::post('/declaration/create','DeclarationController@store')->name('declaration.store')->middleware('auth');
Route::delete('/declaration/destroy','DeclarationController@destroy')->name('declaration.destroy')->middleware('auth');
//Route::resource('/profedit','UserController')->only(['update'])->middleware('auth');
//Route::get('/profedit','UserController@profeditForm')->name('profedit');