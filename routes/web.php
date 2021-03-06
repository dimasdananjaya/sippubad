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



Auth::routes();
Auth::routes(['register' => false]);


// user protected routes
Route::group(['middleware' => ['auth', 'mahasiswa'], 'prefix' => 'mahasiswa'], function () {
    Route::get('/dashboard', 'DashboardMahasiswa@index')->name('mahasiswa_dashboard');
    Route::get('/profil', 'DashboardMahasiswa@mahasiswaEditProfilPage')->name('mahasiswa-edit-profil-page');
    Route::put('/profil/update', 'DashboardMahasiswa@mahasiswaUpdateProfil');
});

// admin protected routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin_dashboard');
    Route::get('/print', 'PDFController@printPembayaran')->name('printPDF');
    Route::get('/profil', 'AdminController@editProfilPage')->name('admin-edit-profil-page');
    Route::get('/pembayaran-periode', 'RekapPembayaranPeriode@rekapPembayaranPeriode');
    Route::get('/pembayaran-periode-list', 'RekapPembayaranPeriode@listPembayaranPeriode');
    Route::get('/rekap-tagihan', 'TagihanController@rekapTagihan');
    Route::put('/profil/update', 'AdminController@adminUpdateProfil');
    Route::put('/pembayaran/update_status_pembayaran', 'PembayaranController@StatusPembayaranUpdate');
    Route::Post('/pembayaran/status_pembayaran','PembayaranController@statusPembayaran');
    Route::Post('/tagihan/tambah','TagihanController@tambahTagihan');
    Route::put('/tagihan/update/{id}','TagihanController@updateTagihan');
    Route::resource('/periode','PeriodeController');
    Route::resource('/user','UserController');
    Route::resource('/biaya_prodi','BiayaProdiController');
    Route::resource('/pembayaran','PembayaranController');
    Route::resource('/rekap-pembayaran','RekapPembayaranController');
    

});

Route::fallback(function(){
    return view('errors.404');
});