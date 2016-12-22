<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/post', function () {
    return view('frontend.post');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/home', 'HomeController@index');

/*
  |--------------------------------------------------------------------------
  | Auth routes
  |--------------------------------------------------------------------------
  |
 */

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register/confirm', function () {
    return view('frontend.auth.confirm');
});

//Facebook Auth
Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback');

/*
  |--------------------------------------------------------------------------
  | Admin routes
  |--------------------------------------------------------------------------
  |
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

    Route::get('/', 'AdminController@index');

    Route::get('/post', function () {
        return view('backend.post.list');
    });

    Route::get('/post/add', function () {
        return view('backend.post.add');
    });

    Route::get('/users', function () {
        return view('backend.users.list');
    });

    Route::get('/users/add', function () {
        return view('backend.users.add');
    });

    Route::get('/parameters', function () {
        return view('backend.settings.parameters');
    });

    Route::get('/comments', function () {
        return view('backend.comments.list');
    });

    Route::get('/messages', function () {
        return view('backend.messages.list');
    });

    Route::get('/survey', function () {
        return view('backend.survey.list');
    });

    Route::get('/survey/add', function () {
        return view('backend.survey.add');
    });
    
});





