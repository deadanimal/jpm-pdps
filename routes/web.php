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
	return redirect('portal/index');
});

Auth::routes();

Route::get('/{locale}', function ($locale){
	Session::put('locale',$locale);
	return redirect()->back();
});

Route::get('color/{color}', function ($color){
	Session::put('color',$color);
	return redirect()->back();
});

Route::any('portal/index', 'PortalController@index')->name('portal.index');
// Route::any('portal/index', 'PortalController@index')->name('portal.index');
// Route::get('program-list', 'PortalController@program_list')->name('program-list');
Route::any('portal/program-list/{ks}/{kat}', 'PortalController@program_list')->name('portal.program-list');
Route::any('portal/program-detail/{ks}/{kat}/{pid}', 'PortalController@program_detail')->name('portal.program-detail');
Route::any('portal/bantuan-sosial', 'PortalController@bantuan_sosial')->name('portal.bantuan-sosial');
Route::any('portal/insuran-sosial', 'PortalController@insuran_sosial')->name('portal.insuran-sosial');
Route::any('portal/intervensi-pasaran-buruh', 'PortalController@inetrvensi_pasaran_buruh')->name('portal.intervensi-pasaran-buruh');
Route::any('portal/pengurusan-data', 'PortalController@pengurusan_data')->name('portal.pengurusan-data');
Route::any('portal/contact-us', 'PortalController@contact_us')->name('portal.contact-us');
Route::any('portal/faq', 'PortalController@faq')->name('portal.faq');
Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('pricing', 'PageController@pricing')->name('page.pricing');
Route::get('lock', 'PageController@lock')->name('page.lock');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('category', 'CategoryController', ['except' => ['show']]);
	Route::resource('tag', 'TagController', ['except' => ['show']]);
	Route::resource('item', 'ItemController', ['except' => ['show']]);
	
	Route::resource('orgdata', 'OrgdataController');
	Route::get('orgdata/email', 'OrgdataController@email')->name('orgdata.email');

	// Route::resource('program', 'ProgramController', ['except' => ['show']]);
	Route::resource('program', 'ProgramController');
	Route::get('program/email', 'ProgramController@email')->name('program.email');
	// Route::get('program/view', 'ProgramController@view')->name('program.view');
	// Route::get('program', ['as' => 'program.view', 'uses' => 'ProgramController@view']);
	// Route::get('program/view', 'ProgramController@view')->name('program.view');
	// Route::get('/program', [ProgramController::class, 'view']);

	Route::resource('media', 'MediaController');
	Route::get('media/email', 'mediaController@email')->name('media.email');

	Route::get('pengurusan-kandungan/program', 'PengurusanKandunganController@program')->name('pengurusan-kandungan.program');
	Route::get('pengurusan-kandungan/approve-program/{id}/{value}/{task}', 'PengurusanKandunganController@approve_program')->name('pengurusan-kandungan.approve-program');
	Route::get('pengurusan-kandungan/delete-program/{id}', 'PengurusanKandunganController@delete_program')->name('pengurusan-kandungan.delete-program');
	Route::get('pengurusan-kandungan/media', 'PengurusanKandunganController@media')->name('pengurusan-kandungan.media');
	Route::get('pengurusan-kandungan/approve-media/{id}/{value}/{task}', 'PengurusanKandunganController@approve_media')->name('pengurusan-kandungan.approve-media');
	Route::get('pengurusan-kandungan/delete-media/{id}', 'PengurusanKandunganController@delete_media')->name('pengurusan-kandungan.delete-media');
	Route::get('pengurusan-kandungan/email', 'PengurusanKandunganController@email')->name('pengurusan-kandungan.email');

	Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
	Route::resource('user', 'UserController', ['except' => ['show']]);

	Route::get('profil', 'ProfilController@index')->name('profil.index');	
	Route::get('profil/excel/{icno}', 'ProfilController@excel')->name('profil.excel');
	Route::get('profil/profilPdf', 'ProfilController@profilPdf')->name('profil.profilPdf');
	Route::get('profil/exportPdf/{icno}', 'ProfilController@exportPdf')->name('profil.exportPdf');
	Route::get('profil/view/{icno}', 'ProfilController@view')->name('profil.view');


	Route::get('laporan', 'LaporanController@index')->name('laporan.index');
	Route::get('laporan/program-bantuan', 'LaporanController@program_bantuan')->name('laporan.program_bantuan');
	Route::get('laporan/penerima-program-bantuan', 'LaporanController@penerima_program_bantuan')->name('laporan.penerima_program_bantuan');
	Route::get('laporan/excel', 'LaporanController@excel')->name('laporan.excel');

	Route::get('laporan-program-bantuan', 'LaporanProgramBantuanController@index')->name('laporan-program-bantuan.index');
	Route::get('laporan-program-bantuan/excel/{program_id}', 'LaporanProgramBantuanController@excel')->name('laporan-program-bantuan.excel');
	Route::get('laporan-program-bantuan/viewpdf', 'LaporanProgramBantuanController@viewpdf')->name('laporan-program-bantuan.viewpdf');
	Route::get('laporan-program-bantuan/exportPdf/{program_id}', 'LaporanProgramBantuanController@exportPdf')->name('laporan-program-bantuan.exportPdf');

	Route::get('laporan-senarai-program', 'LaporanSenaraiProgramController@index')->name('laporan-senarai-program.index');
	Route::get('laporan-senarai-program/excel/{program_id}/{agensi_id}', 'LaporanSenaraiProgramController@excel')->name('laporan-senarai-program.excel');
	Route::get('laporan-senarai-program/viewpdf', 'LaporanSenaraiProgramController@viewpdf')->name('laporan-senarai-program.viewpdf');
	Route::get('laporan-senarai-program/exportPdf/{program_id}/{agensi_id}', 'LaporanSenaraiProgramController@exportPdf')->name('laporan-senarai-program.exportPdf');

	Route::get('laporan-penerima-program-bantuan', 'LaporanPenerimaProgramBantuanController@index')->name('laporan-penerima-program-bantuan.index');
	Route::get('laporan-penerima-program-bantuan/excel/{req_jantina}/{req_etnik}/{req_agama}/{req_status_perkahwinan}/{req_negeri}', 'LaporanPenerimaProgramBantuanController@excel')->name('laporan-penerima-program-bantuan.excel');
	Route::get('laporan-penerima-program-bantuan/viewpdf', 'LaporanPenerimaProgramBantuanController@viewpdf')->name('laporan-penerima-program-bantuan.viewpdf');
	Route::get('laporan-penerima-program-bantuan/exportPdf/{req_jantina}/{req_etnik}/{req_agama}/{req_status_perkahwinan}/{req_negeri}', 'LaporanPenerimaProgramBantuanController@exportPdf')->name('laporan-penerima-program-bantuan.exportPdf');

	Route::get('laporan-penerima-program', 'LaporanPenerimaProgramController@index')->name('laporan-penerima-program.index');
	Route::get('laporan-penerima-program/excel/{req_jantina}/{req_etnik}/{req_agama}/{req_status_perkahwinan}/{req_negeri}', 'LaporanPenerimaProgramController@excel')->name('laporan-penerima-program.excel');
	Route::get('laporan-penerima-program/viewpdf', 'LaporanPenerimaProgramController@viewpdf')->name('laporan-penerima-program.viewpdf');
	Route::get('laporan-penerima-program/exportPdf/{req_jantina}/{req_etnik}/{req_agama}/{req_status_perkahwinan}/{req_negeri}', 'LaporanPenerimaProgramController@exportPdf')->name('laporan-penerima-program.exportPdf');

	Route::get('laporan-pengunjung-program', 'LaporanPengunjungProgramController@index')->name('laporan-pengunjung-program.index');
	Route::get('laporan-pengunjung-program/excel/{program_id}/{agensi_id}', 'LaporanPengunjungProgramController@excel')->name('laporan-pengunjung-program.excel');
	Route::get('laporan-pengunjung-program/viewpdf', 'LaporanPengunjungProgramController@viewpdf')->name('laporan-pengunjung-program.viewpdf');
	Route::get('laporan-pengunjung-program/exportPdf/{program_id}/{agensi_id}', 'LaporanPengunjungProgramController@exportPdf')->name('laporan-pengunjung-program.exportPdf');
	
	Route::get('laporan-pengunjung-program-bantuan', 'LaporanPengunjungProgramBantuanController@index')->name('laporan-pengunjung-program-bantuan.index');
	Route::get('laporan-pengunjung-program-bantuan/excel/{tarikh_mula}/{tarikh_tamat}/{program_id}/{agensi_id}', 'LaporanPengunjungProgramBantuanController@excel')->name('laporan-pengunjung-program-bantuan.excel');
	Route::get('laporan-pengunjung-program-bantuan/viewpdf', 'LaporanPengunjungProgramBantuanController@viewpdf')->name('laporan-pengunjung-program-bantuan.viewpdf');
	Route::get('laporan-pengunjung-program-bantuan/exportPdf/{tarikh_mula}/{tarikh_tamat}/{program_id}/{agensi_id}', 'LaporanPengunjungProgramBantuanController@exportPdf')->name('laporan-pengunjung-program-bantuan.exportPdf');
	
	Route::get('laporan-jejak-audit', 'LaporanJejakAuditController@index')->name('laporan-jejak-audit.index');
	Route::get('laporan-jejak-audit/excel/{tarikh_mula}/{tarikh_tamat}', 'LaporanJejakAuditController@excel')->name('laporan-jejak-audit.excel');
	Route::get('laporan-jejak-audit/viewpdf', 'LaporanJejakAuditController@viewpdf')->name('laporan-jejak-audit.viewpdf');
	Route::get('laporan-jejak-audit/exportPdf/{program_id}/{agensi_id}', 'LaporanJejakAuditController@exportPdf')->name('laporan-jejak-audit.exportPdf');
	
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});


