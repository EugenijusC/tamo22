<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config; 
use Barryvdh\Debugbar\Twig\Extension\Debug;

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



Route::view('/', 'welcome')->name('home');

Route::get('/users/export/', 'UserController@export')->name('export');
Route::get('/users/login_tuv/', 'UserController@loginT')->name('loginT');
Route::get('/mail/user/', 'UserController@mailUser')->name('mailU');



Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/klausimai','KlausimaiController');
    Route::resource('/kontaktai','ContactController');
    Route::resource('/testai','TestaiController');
    Route::resource('/useriai','UseriaiController');
    Route::get('/user/search', 'SearchController@index')->name('search');
    //Route::get('/testai/{id}', 'TestController@edit')->name('testas_smulkiai');
    Route::get('/rezults/{id}/{name?}', 'TestaiController@testas_sm')->name('testas_smulkiai');

    

    // Route::resource('/klausimai', 'CategoryController');
    // Route::resource('/tags', 'TagController');
    // Route::resource('/posts', 'PostController');

});

Route::group(['middleware' => 'web'], function () {
    Route::get('/register', 'UserController@create')->name('register.create');

    Route::get('/forgot-password', 'UserController@forgot')->name('password.request');
    Route::post('/forgot-password', 'UserController@forgot_store')->name('password.request2');
    
    Route::get('/reset-password', 'UserController@passw_create')->name('password.reset');
//Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');

    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');

    Route::post('/contacts/check', 'UserController@contacts_check');
    Route::post('/rezults/check', 'UserController@rezults_check');

    Route::get('/test', 'TestController@testo_start')->name('test');
    Route::post('/testas/start', 'TestController@testas')->name('testas');
    Route::post('/endtest', 'TestController@endtest')->name('endtest');
    Route::get('/rezults', 'TestController@rezults')->name('rezults');
  //  Route::post('/rezults', 'TestController@rezults')->name('rezults');

    Route::get('/rezults/{id}', 'TestController@rezults_sm')->name('rezults_smulkiai');
   
    // Route::post('/smulkiau', 'TestController@rezults_sm')->name('smulkiau');


    Route::get('/contacts', 'UserController@contacts')->name('contacts');

    Route::view('/start', 'user.start')->name('start');
});

Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');




//Route::get('/atgal', 'UserController@atgal')->name('atgal');

//Route::get('/', 'MainController@home');
//
//Route::get('/login', 'MainController@loginForm')->name('login.create');
//Route::post('/login', 'MainController@login')->name('login');
//Route::get('/logout','MainController@logout')->name('logout');
//
//
//
//Route::get('/contacts', 'MainController@contacts')->name('contacts');;
//
//Route::get('/testas', 'MainController@contacts');
//
//Route::post('/contacts/check', 'MainController@contacts_check');
//
//Route::get('/testas', function () {
//    return view('testas');
//} );
//

//Route::get('/home', 'UserController@home');

//
//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');





//Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
//    Route::get('/', 'MainController@index')->name('admin.index');
//    Route::resource('/categories', 'CategoryController');
//    Route::resource('/tags', 'TagController');
//    Route::resource('/posts', 'PostController');
//});
//
//Route::group(['middleware' => 'guest'], function () {
//    Route::get('/register', 'UserController@create')->name('register.create');
//    Route::post('/register', 'UserController@store')->name('register.store');
//    Route::get('/login', 'UserController@loginForm')->name('login.create');
//    Route::post('/login', 'UserController@login')->name('login');
//    Route::get('/contacts', 'UserController@contacts')->name('contacts');
//  //  Route::get('/home', 'UserController@home')->name('home');
//    Route::get('/', 'UserController@welcome')->name('welcome');
//});
//
//
//Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');

