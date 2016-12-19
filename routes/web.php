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




Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/register/confirm', function () {
    return view('frontend.auth.confirm');
});


Route::get('/home', 'HomeController@index');



/*---------------------------------------------
| Admin pages
|--------------------------------------------*/

/*---------------------------------------------
| Dashborad page
|--------------------------------------------*/

Route::get('/admin', 'AdminController@index');  
//Route::get('/admin', function () {
//    return view('backend.home');
//});

Route::get('/admin/post', function () {
    return view('backend.post.list');
});

Route::get('/admin/post/add', function () {
    return view('backend.post.add');
});

Route::get('/admin/users', function () {
    return view('backend.users.list');
});

Route::get('/admin/users/add', function () {
    return view('backend.users.add');
});


Route::get('/admin/parameters', function () {
    return view('backend.settings.parameters');
});

Route::get('/admin/comments', function () {
    return view('backend.comments.list');
});

Route::get('/admin/messages', function () {
    return view('backend.messages.list');
});

Route::get('/admin/survey', function () {
    return view('backend.survey.list');
});

Route::get('/admin/survey/add', function () {
    return view('backend.survey.add');
});