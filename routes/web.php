<?php

/*
  |--------------------------------------------------------------------------
  | Frontend Routes
  |--------------------------------------------------------------------------
 */

Route::get('/', function () {
    return view('frontend.layouts.master');
});
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/alejandrocolautti', function () {
    return view('frontend.alejandrocolautti');
});

Route::post('/survey', 'SurveyController@vote');


// Blog routes
Route::get('/', 'BlogController@index');
Route::get('/post/{id}', 'BlogController@getPost');

// Contact routes
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');


// Profile routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'ProfileController@showProfileForm');
    Route::post('/profile', 'ProfileController@updateProfile');
    Route::get('/change_password', 'ProfileController@showPasswordForm');
    Route::post('/change_password', 'ProfileController@updatePassword');
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
  | Backend routes
  |--------------------------------------------------------------------------
  |
 */

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
 //Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function() {
 //
    //Dashboard routes
    Route::get('/', 'AdminController@index');

    //Comments routes
    Route::get('/comments', function () {
        return view('backend.comments.list');
    });
    
    //Post routes
    Route::get('/post', 'PostController@index');
    Route::get('/post/getdata', 'PostController@getPostList');
    Route::post('/post/{id}', 'PostController@publish');
    Route::get('/post/create', 'PostController@create');
    Route::post('/post', 'PostController@store');
    Route::get('/post/{id}', 'PostController@show');
    Route::get('/post/{id}', 'PostController@show');
    Route::get('/post/{id}/edit', 'PostController@edit');
    Route::patch('/post/{id}', 'PostController@update'); 
    Route::delete('/post/{id}', 'PostController@destroy_ajax');
    Route::get('/post/{id}/delete', 'PostController@destroy');
      
    
    //Message routes
    Route::get('/messages', 'ContactController@index');
    Route::get('/messages/getdata', 'ContactController@getMessage');
    Route::get('/messages/{id}', 'ContactController@show');
    
    
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
    
    
    //Users routes
    Route::get('/users', 'UsersController@index');
    Route::get('/users/getdata', 'UsersController@getUsers');
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
    
    //Other routes
    Route::get('/parameters', function () {
        return view('backend.settings.parameters');
    });

    Route::resource('comments', 'CommentsController');
    
});





