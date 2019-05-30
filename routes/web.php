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
        ->select('p.id','p.title','u.username','p.content','p.updated_at','p.summary','p.slug','p.created_at','p.descripcion','u.avatar','p.image_path')
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
        ->where('s.estado',1)
        ->orderBy('s.orden','asc')
        ->get();

    $sponsors = DB::table('sponsors as s')
        ->where('s.estado',1)
        ->orderBy('s.orden','asc')
        ->get();

    $miembros = DB::table('miembros as m')
        ->where('m.estado',1)
        ->orderBy('m.orden','asc')
        ->get();

    $avales = DB::table('avales as a')
        ->where('a.estado',1)
        ->orderBy('a.orden','asc')
        ->get();

    $quienessomos = DB::table('quienessomos as q')
        ->where('q.estado',1)
        ->orderBy('q.orden','asc')
        ->get();

    $concursosymuestras = DB::table('concursosymuestras as c')
        ->where('c.estado',1)
        ->orderBy('c.created_at','asc')
        ->take(6)
        ->get();

//    dd($galerias);
    return view('frontend.welcome', ['posts' => $posts,'header' => $header, 'galerias' => $galerias, 'standsyartistas' => $standsyartistas, 'sponsors' => $sponsors, 'miembros' => $miembros, 'avales' => $avales, 'quienessomos' => $quienessomos, 'concursosymuestras' => $concursosymuestras]);
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

Route::get('/concursoymuestra/{slug}', function ($d) {
//    dd($d);
    $concursoymuestra = DB::table('concursosymuestras as g')
        ->where('slug','=',$d)
        ->first();
//    dd($concursoymuestra);
    $concursoymuestraimagen = DB::table('concursosymuestras_imagens')
        ->where('concursosymuestra_id','=',$concursoymuestra->id)
        ->get();

//    dd($concursoymuestraimagen);
    return view('frontend.includes.concursoymuestra.index',['concursoymuestra' => $concursoymuestra, 'concursosymuestrasimagen' => $concursoymuestraimagen]);
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

    //Header Routes
    Route::get('/singlepage/header', 'HeaderController@index');
    Route::get('/singlepage/header/create', 'HeaderController@create');
    Route::get('/singlepage/header/{id}', 'HeaderController@show');
    Route::get('/singlepage/header/{id}/edit', 'HeaderController@edit');
    Route::post('/singlepage/header/store', 'HeaderController@store');
    Route::patch('/singlepage/header/{id}', 'HeaderController@update');
    Route::get('/singlepage/header/{id}/delete', 'HeaderController@destroy');

    Route::post('/singlepage/header/store', 'HeaderController@store');
    Route::get('/singlepage/header/ordenarHeader', 'HeaderController@ordenarHeader')->name('ordenarHeader');
    Route::get('/singlepage/header/cambiarEstadoHeader', 'HeaderController@cambiarEstadoHeader')->name('cambiarEstadoHeader');

    //Galeria Routes
    Route::get('/singlepage/galeria', 'GaleriaController@index');
    Route::get('/singlepage/galeria/create', 'GaleriaController@create');
    Route::post('/singlepage/galeria/store', 'GaleriaController@store');
    Route::get('/singlepage/galeria/ordenarGalerias', 'GaleriasController@ordenarGalerias')->name('ordenarGalerias');
    Route::get('/singlepage/galeria/cambiarEstadoGalerias', 'GaleriasController@cambiarEstadoGalerias')->name('cambiarEstadoGalerias');


    //Stand y Artistas Routes
    Route::get('/singlepage/standsyartista', 'StandsYArtistasController@index');
    Route::get('/singlepage/standsyartista/create', 'StandsYArtistasController@create');
    Route::post('/singlepage/standsyartista/store', 'StandsYArtistasController@store');
    Route::get('/singlepage/standsyartista/ordenarStandsYArtistas', 'StandsYArtistasController@ordenarStandsYArtistas')->name('ordenarStandsYArtistas');
    Route::get('/singlepage/standsyartista/cambiarEstadoStandsYArtistas', 'StandsYArtistasController@cambiarEstadoStandsYArtistas')->name('cambiarEstadoStandsYArtistas');

    //Sponsors Routes
    Route::get('/singlepage/sponsor', 'SponsorsController@index');
    Route::get('/singlepage/sponsor/create', 'SponsorsController@create');
    Route::post('/singlepage/sponsor/store', 'SponsorsController@store');
    Route::get('/singlepage/sponsor/ordenarSponsors', 'SponsorsController@ordenarSponsors')->name('ordenarSponsors');
    Route::get('/singlepage/sponsor/cambiarEstadoSponsors', 'SponsorsController@cambiarEstadoSponsors')->name('cambiarEstadoSponsors');

    //Miembros Routes
    Route::get('/singlepage/miembro', 'MiembrosController@index');
    Route::get('/singlepage/miembro/create', 'MiembrosController@create');
    Route::post('/singlepage/miembro/store', 'MiembrosController@store');
    Route::get('/singlepage/miembro/ordenarMiembros', 'MiembrosController@ordenarMiembros')->name('ordenarMiembros');
    Route::get('/singlepage/miembro/cambiarEstadoMiembros', 'MiembrosController@cambiarEstadoMiembros')->name('cambiarEstadoMiembros');

    //Avales Routes
    Route::get('/singlepage/aval', 'AvalesController@index');
    Route::get('/singlepage/aval/create', 'AvalesController@create');
    Route::post('/singlepage/aval/store', 'AvalesController@store');
    Route::get('/singlepage/aval/ordenarAvales', 'AvalesController@ordenarAvales')->name('ordenarAvales');
    Route::get('/singlepage/aval/cambiarEstadoAvales', 'AvalesController@cambiarEstadoAvales')->name('cambiarEstadoAvales');

    //Quienes somos Routes
    Route::get('/singlepage/quienessomo', 'QuienesSomosController@index');
    Route::get('/singlepage/quienessomo/create', 'QuienesSomosController@create');
    Route::post('/singlepage/quienessomo/store', 'QuienesSomosController@store');
    Route::get('/singlepage/quienessomo/ordenarQuienesSomos', 'QuienesSomosController@ordenarQuienesSomos')->name('ordenarQuienesSomos');
    Route::get('/singlepage/quienessomo/cambiarEstadoQuienesSomos', 'QuienesSomosController@cambiarEstadoQuienesSomos')->name('cambiarEstadoQuienesSomos');

    //Concursos y muestras Routes
    Route::get('/singlepage/concursoymuestra', 'ConcursosYMuestrasController@index');
    Route::get('/singlepage/concursosymuestra/create', 'ConcursosYMuestrasController@create');
    Route::post('/singlepage/concursosymuestra/store', 'ConcursosYMuestrasController@store');
    Route::get('/singlepage/concursosymuestra/ordenarConcursosYMuestras', 'ConcursosYMuestrasController@ordenarConcursosYMuestras')->name('ordenarConcursosYMuestras');
    Route::get('/singlepage/concursosymuestra/cambiarEstadoConcursosYMuestras', 'ConcursosYMuestrasController@cambiarEstadoConcursosYMuestras')->name('cambiarEstadoConcursosYMuestras');

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





