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
	return view('pages.landing');
})->name('landing');

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('pricing', 'PageController@pricing')->name('page.pricing');
Route::get('lock', 'PageController@lock')->name('page.lock');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('category', 'CategoryController', ['except' => ['show']]);
	Route::resource('tag', 'TagController', ['except' => ['show']]);
	Route::resource('item', 'ItemController', ['except' => ['show']]);
	
	Route::resource('orgdata', 'OrgdataController', ['except' => ['show']]);
	Route::get('orgdata/email', 'OrgdataController@email')->name('orgdata.email');

	// Route::resource('program', 'ProgramController', ['except' => ['show']]);
	Route::resource('program', 'ProgramController');
	Route::get('program/email', 'ProgramController@email')->name('program.email');
	// Route::get('program/view', 'ProgramController@view')->name('program.view');
	// Route::get('program', ['as' => 'program.view', 'uses' => 'ProgramController@view']);
	// Route::get('program/view', 'ProgramController@view')->name('program.view');
	// Route::get('/program', [ProgramController::class, 'view']);

	Route::resource('media', 'MediaController', ['except' => ['show']]);
	Route::get('media/email', 'mediaController@email')->name('media.email');

	Route::resource('profil', 'ProfilController', ['except' => ['show']]);
	Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
	Route::resource('user', 'UserController', ['except' => ['show']]);

	Route::get('profil', 'ProfilController@index')->name('profil.index');

	Route::get('laporan', 'LaporanController@index')->name('laporan.index');
	Route::get('laporan/program-bantuan', 'LaporanController@program_bantuan')->name('laporan.program_bantuan');
	Route::get('laporan/penerima-program-bantuan', 'LaporanController@penerima_program_bantuan')->name('laporan.penerima_program_bantuan');
	Route::get('laporan/excel', 'LaporanController@excel')->name('laporan.excel');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});


