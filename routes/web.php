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

Route::get('/', 'MicropostsController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::get('intro', 'IntroController@index')->name('microposts.intro');

Route::get('intro', 'IntroController@index')->name('microposts.intro');
Route::get('point', 'PointController@index')->name('microposts.point');

Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        
        
        Route::post('favorite', 'UserFavoriteController@store')->name('users.favorite');
        Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('users.unfavorite');
        Route::get('favoritings', 'UsersController@favoritings')->name('users.favoritings');
        Route::get('favoriters', 'UsersController@favoriters')->name('users.favoriters');
        
        Route::post('done', 'UserDoneController@store')->name('users.done');
        Route::delete('undone', 'UserDoneController@destroy')->name('users.undone');
        Route::get('doneings', 'UsersController@doneings')->name('users.doneings');
        Route::get('doners', 'UsersController@doners')->name('users.doners');

        
    });

    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'update', 'destroy', 'edit']]);
    Route::resource('comments', 'CommentsController', ['only' => ['store', 'update', 'destroy', 'edit']]);
    Route::resource('point', 'PointsController', ['only' => ['store', 'update']]);
    
    Route::post('/', 'MicropostsController@index')->name('microposts.search');

});
