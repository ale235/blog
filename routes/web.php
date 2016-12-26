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

//Route::get('/contact', function () {
//    return view('frontend.contact');
//});

//Route::get('/contact', function () {
//    return view('frontend.contact');
//});

//Contact routes
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');


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
Route::get('auth/twitter', 'Auth\RegisterController@redirectToTwitter');
Route::get('auth/twitter/callback', 'Auth\RegisterController@handleTwitterCallback');


/*
  |--------------------------------------------------------------------------
  | Admin routes
  |--------------------------------------------------------------------------
  |
 */

//Route::get('admin/users', 'Admin\UsersController@index');
//Route::get('admin/users/getdata', 'Admin\UsersController@getUsers');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
//Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function() {
    
    
    Route::get('/', 'AdminController@index');

    Route::get('/post', function () {
        return view('backend.post.list');
    });

    Route::get('/post/add', function () {
        return view('backend.post.add');
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

   
    
    
    Route::get('/profile', function () {
        return view('backend.settings.profile');
    });
    
    
    //Survey routes
    Route::get('/survey', 'SurveyController@index');
    Route::get('/survey/getdata', 'SurveyController@getSurvey');
    Route::get('/survey/add', 'SurveyController@create');
    Route::post('/survey/add', 'SurveyController@store');
    Route::get('/survey/edit/{id}', 'SurveyController@edit');
    Route::post('/survey/edit/{id}', 'SurveyController@update');
    Route::delete('/survey/{id}', 'SurveyController@destroy');
    Route::get('/survey/stat/{id}', 'SurveyController@getStat');
    
    
    
    //Tag routes
    Route::get('/tags', 'TagsController@index');
    Route::get('tags/getdata', 'TagsController@getTags');
    Route::post('/tags', 'TagsController@addTag');
    Route::get('/tags/{id}', 'TagsController@showEditTag');
    Route::post('/tags/{id}', 'TagsController@update');
    Route::delete('/tags/{id}', 'TagsController@destroy');
    
    //User routes
    Route::get('/users', 'UsersController@index');
    Route::get('users/getdata', 'UsersController@getUsers');
    Route::get('users/add', 'UsersController@ShowAddUserForm');
    Route::post('users/add', 'UsersController@addUser');
    Route::get('users/edit/{id}', 'UsersController@ShowEditUserForm');
    Route::post('users/edit/{id}', 'UsersController@EditUser');
    Route::delete('users/{id}', 'UsersController@deleteUser');
    
    //Profile & password routes
    Route::get('/profile',   'ProfileController@index');
    Route::post('/profile',  'ProfileController@updateProfile');
    Route::get('/password',  'ProfileController@showPasswordForm');
    Route::post('/password', 'ProfileController@updatePassword');
    
});





