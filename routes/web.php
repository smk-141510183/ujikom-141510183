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
	if ( Auth::user()) {
    return view('Backend');
	}
	else {
		return view('/auth/login');
	}
});



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('golongan','GolonganController');
Route::resource('pegawai','PegawaiController');
Route::resource('jabatan','jabatanController');
Route::resource('kategorilembur','KategoriLemburController');
Route::resource('lemburpegawai','LemburPegawaiController');
Route::resource('tunjangan','TunjanganController');
Route::resource('tunjanganpegawai','TunjanganPegawaiController');
Route::resource('penggajian','PenggajianController');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

// Route::group(['middleware' => ['api']], function () {
//     Route::post('register', 'ApiController@register');
//     Route::post('login', 'ApiController@login');
//     Route::group(['middleware' => 'jwt-auth'], function () {
//     	Route::post('get_user_details', 'ApiController@get_user_details');
//     });
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
