<?php

/*
  |--------------------------------------------------------------------------
  | Frontend Routes
  |--------------------------------------------------------------------------
 */

use App\Models\Galeria;
use App\Models\Header;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $posts = DB::table('posts as p')
        ->select('p.id','p.title','u.username','p.content','p.updated_at','p.summary','p.slug','p.created_at','p.descripcion','u.avatar')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->where('p.published', 1)
        ->orderBy('p.created_at', 'desc')
        ->paginate(3);
    $header = Header::first();
    $galerias = DB::table('galerias as g')
                ->where('g.estado',1)
                ->orderBy('g.created_at','desc')
                ->take(6)
                ->get();
    $standsyartistas = DB::table('standsyartistas as s')
//        ->where('g.estado',1)
        ->orderBy('s.created_at','desc')
        ->take(12)
        ->get();

//    dd($galerias);
    return view('frontend.welcome', ['posts' => $posts,'header' => $header, 'galerias' => $galerias, 'standsyartistas' => $standsyartistas]);
});

Route::get('/principal', function () {

    return view('frontend.principal');
});

Route::get('/galeria/{slug}', function ($d) {
//    dd($d);
    $galeria = DB::table('galerias as g')
                ->where('slug','=',$d)
                ->first();
    $galeriaimagen = DB::table('galeria_imagens')
                        ->where('galeria_id','=',$galeria->id)
                        ->get();
    return view('frontend.includes.galeria.index',['galeria' => $galeria, 'galeriaimagen' => $galeriaimagen]);
});

Route::get('/blog', 'BlogController@index');

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/alejandrocolautti', function () {
    return view('frontend.alejandrocolautti');
});

Route::post('/survey', 'SurveyController@vote');

// Blog routes
Route::get('/post/{slug}', 'BlogController@getPost');
Route::get('/admin', 'AdminController@index');
Route::get('/login', 'LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');

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

    //Single Page routes
    Route::get('/singlepage', function () {
        return view('backend.singlepage.index');
    });

    Route::get('/singlepage/header', 'SinglePageController@header');
    Route::post('/singlepage/header/headerestilouno', 'SinglePageController@headerestilouno');
    Route::post('/singlepage/header/headerestilodos', 'SinglePageController@headerestilodos');

    //Galeria Routes
    Route::get('/singlepage/galeria', 'GaleriaController@index');
    Route::get('/singlepage/galeria/create', 'GaleriaController@create');
    Route::post('/singlepage/galeria/store', 'GaleriaController@store');

    //Stand y Artistas Routes
    Route::get('/singlepage/standsyartista', 'StandsYArtistasController@index');
    Route::get('/singlepage/standsyartista/create', 'StandsYArtistasController@create');
    Route::post('/singlepage/standsyartista/store', 'StandsYArtistasController@store');
    
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





