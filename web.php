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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home','HomeController@home');
Route::get('/home', function () {
    return view('welcome');
});

Route::get('login1','LoginsController@login');
Route::get('/login1', function () {
    return view('logins/login');
});
Route::get('newuser','UserregisterController@register');
Route::get('/login1', function () {
    return view('logins/login');
});

Route::get('/customer', function () {
    return view('logins/customerregister');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/newuser', 'CustomerregisterController@store');
//Route::post('/custreg', 'CustomerregisterController@store')->name('home');

Route::post('/registers', 'RegistersController@register')->name('home');
Route::post('/reg', 'RegistersController@store')->name('home');

Route::post('/designReg', 'RegistersController@designerstore')->name('home');

Route::post('/distributorReg', 'RegistersController@distributorstore')->name('home');

Route::post('/log', 'LogsController@login');

//Route::post('/logout', 'LogsController@logout');
//Route::get('logout','LogsController@logout');

Route::group(['middleware' => 'preventbackbutton','auth'],function(){
    
    Route::get('/home', 'HomeController@index');
  });

//Route::post('/log', 'RegistersController@designerstore');

Route::post('/registers', 'RegistersController@register')->name('home');
Route::get('/designerProducts', 'LogsController@designerProducts')->name('home');

Route::get('/profile/{reg_id}', [
    'as' => 'logs', 'uses' => 'LogsController@profile'
]);
Route::get('/profile_edit/{reg_id}', [
    'as' => 'profile_edit', 'uses' => 'LogsController@profile_edit'
]);
//Route::any('/profile_update/{reg_id}', [
  //  'as' => 'admin_profile_update', 'uses' => 'LogsController@profile_update'
//]);


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\LogsController@logout');


Route::get('/admin/profile', 'LogsController@profile');

//Route::get('/profile_edit', 'LogsController@admin_profile_update')->name('home');
