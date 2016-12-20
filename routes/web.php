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

Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});


Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/profile', function () {
        return view('frontend.user.profile');
    });
    Route::get('/change_password', function () {
        return view('frontend.user.change_password');
    });
    
    
    
});


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


/*
  |--------------------------------------------------------------------------
  | Scial routes
  |--------------------------------------------------------------------------
  |
 */
//Facebook routes
Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback');

//Google routes
Route::get('auth/google', 'Auth\RegisterController@redirectToGoogle'); 
Route::get('auth/google/callback', 'Auth\RegisterController@handleGoogleCallback');

//Twitter routes
Route::get('auth/twitter', 'Auth\AuthController@redirectToTwitter');
Route::get('auth/twitter/callback', 'Auth\AuthController@handleTwitterCallback');



/*
  |--------------------------------------------------------------------------
  | Admin routes
  |--------------------------------------------------------------------------
  |
 */

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    
    Route::get('/', 'AdminController@index');

    Route::get('/post', function () {
        return view('backend.post.list');
    });

    Route::get('/post/add', function () {
        return view('backend.post.add');
    });

    
    
    Route::get('/users', 'UsersController@index');
    Route::get('users/getdata', 'UsersController@getUsers');
    
//    Route::get('/users', function () {
//        return view('backend.users.list');
//    });
    
    

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
    
    
    Route::get('/profile', function () {
        return view('backend.settings.profile');
    });
    
    Route::get('/password', function () {
        return view('backend.settings.password');
    });
    
});





